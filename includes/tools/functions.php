<?php

if (!function_exists('connexion')) {

    function connexion()
    {
        $host = DB_HOST;       //myHostAddress
        $dbuser = DB_USERNAME; //myUserName
        $dbpw = DB_PASSWORD;   //myPassword
        $dbname = DB_NAME;     //myDatabase

        $pdoReqArg1 = "mysql:host=". $host .";dbname=". $dbname .";";
        $pdoReqArg2 = $dbuser;
        $pdoReqArg3 = $dbpw;

        try {

            $db = new \PDO($pdoReqArg1, $pdoReqArg2, $pdoReqArg3);
            $db->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);
            $db->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
            $db->exec("SET NAMES 'utf8'");

            return $db;

        } catch(\PDOException $e) {

            $errorMessage = $e->getMessage();
            echo $errorMessage;
        }
    }
}

if (!function_exists('get_page')) {

    function get_page($uri, $segments)
    {
        if (!isset($segments[2])) {

            switch ($uri) {

                case '/':
                    ob_start();
                    include __REALPATH__ . '/includes/home.php';
                    $content = ob_get_clean();
                    break;

                case '/a-propos':
                    ob_start();
                    include __REALPATH__ . '/includes/about.php';
                    $content = ob_get_clean();
                    break;

                case '/offers':
                    ob_start();
                    include __REALPATH__ . '/includes/offers.php';
                    $content = ob_get_clean();
                    break;

                case '/connexion':
                    ob_start();
                    include __REALPATH__ . '/includes/connexion.php';
                    $content = ob_get_clean();
                    break;

                case '/mentions-legales':
                    ob_start();
                    include __REALPATH__ . '/includes/mentions-legales.php';
                    $content = ob_get_clean();
                    break;

                case '/rgpd':
                    ob_start();
                    include __REALPATH__ . '/includes/rgpd.php';
                    $content = ob_get_clean();
                    break;

                case '/cgu':
                    ob_start();
                    include __REALPATH__ . '/includes/cgu.php';
                    $content = ob_get_clean();
                    break;

                case '/admin':
                    define('ADMIN', true);
                    ob_start();
                    include __REALPATH__ . '/includes/admin/home.php';
                    $content = ob_get_clean();
                    break;

                case '/logout':
                    define('ADMIN', true);
                    logout();
                    header('Location: '.DOMAIN.'/');
                    break;

                default:
                    define('ERROR_404', true);
                    ob_start();
                    include __REALPATH__ . '/includes/404.php';
                    $content = ob_get_clean();
                    http_response_code(404);
                    break;
            }

            return $content;
        }



    }
}

if (!function_exists('maintenance')) {

    function maintenance()
    {
        $ip = [
            '90.50.145.182', // Fred
            '109.214.144.207', // Tristan
            '86.213.50.181' // Clément
        ];

        if ((isset($_SERVER['HTTP_X_FORWARDED_FOR']) && in_array($_SERVER['HTTP_X_FORWARDED_FOR'], $ip))
            || (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], $ip))) {

            return true;

        } else {

            define('MAINTENANCE', true);
            require __REALPATH__ . '/includes/common/head.php';
            require __REALPATH__ . '/includes/maintenance.php';
            require __REALPATH__ . '/includes/common/footer.php';
            exit();
        }
    }
}

if (!function_exists('login')) {

    function login()
    {
        if (!isset($_SESSION['id']) && isset($_POST['login']) && $_POST['login'] == 'ok') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = connexion();
            $query = "SELECT id, name, lastname, email FROM users WHERE email = :email AND password = :password";
            $stt = $db->prepare($query);
            $stt->bindValue(':email', $email, PDO::PARAM_STR);
            $stt->bindValue(':password', md5($password), PDO::PARAM_STR);
            $stt->execute();

            if ($stt->rowCount() > 0) {
                $user = $stt->fetch(\PDO::FETCH_ASSOC);
                $_POST['id'] = $user['id'];

                return $user;
            } else {
                $_POST['error'] = "L'adresse email et le mot de passe ne correspondent pas.";

                return false;
            }
        }
    }
}

if (!function_exists('logout')) {

    function logout()
    {
        session_destroy();
        header('Location: ' . DOMAIN . '/connexion');
    }
}
