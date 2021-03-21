<?php

if (!function_exists('connexion')) {

    function connexion()
    {
        $host = 'localhost';             //myHostAddress
        $dbuser = 'root';     //myUserName
        $dbpw = '';     //myPassword
        $dbname = 'cours_php';     //myDatabase

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

                case '/blog':
                    ob_start();
                    include __REALPATH__ . '/includes/blog.php';
                    $content = ob_get_clean();
                    break;

                case '/contact':
                    ob_start();
                    include __REALPATH__ . '/includes/contact.php';
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

                default:
                    define('ERROR_404', true);
                    ob_start();
                    include __REALPATH__ . '/includes/404.php';
                    $content = ob_get_clean();
                    http_response_code(404);
                    break;
            }

        } else {

        }

        return $content;

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

if (!function_exists('logout')) {

    function logout()
    {
        if (isset($_POST['logout']) && $_POST['logout'] == 'ok') {
            session_destroy();
            header('Location: ' . DOMAIN . '/login');
        }
    }
}
