<?php
if (!isset($_SESSION['id'])) {

    if (isset($_POST['connexion']) && $_POST['connexion'] == 'ok') {

        $user = login();
        if($user) {
            if(isset($_POST['id']) && !isset($_POST['error'])) {
                foreach ($user as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                header('Location: ' . DOMAIN . '/admin');
            } else {
                $_POST['error'] = 'Une erreur est survenue! Veuillez réessayer.';
            }
        }
    }
?>
<section id="login">

    <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12 container-log">
    
        <div class="card_log">
            <?php if(isset($_POST['error'])) { ?>
                <div class="alert alert-error">
                    <?= $error ?>
                </div>
            <?php } ?>
            <div class="welcome">
                <h1>Bienvenue !</h1>
            </div>
            <form class="login" method="post" action="<?= DOMAIN ?>/connexion">
                <input type="hidden" name="login" value="ok" />
                <div class="input_log">
                    <label for="email">Identifiant / Adresse Mail</label>
                    <input type="email" class="input" id="email" name="email" placeholder="exemple@email.com" required spellcheck="false" autocomplete="off" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                </div>
                <div class="input_log">
                    <label for="passwd">Mot de passe</label>
                    <input type="password" class="input" id="password" name="password" placeholder="mot de passe" required spellcheck="false" autocomplete="off">
                </div>
                <div class="remember">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <p id="remember-txt">Se souvenir de moi</p>
                </div>
                <div class="connexion-container">
                    <button type="submit" class="btn_log">
                        <svg width="130" height="62">
                            <defs>
                                <linearGradient id="grad1">
                                    <stop offset="0%" stop-color="#2900FF"/>
                                    <stop offset="100%" stop-color="#2900FF" />
                                </linearGradient>
                            </defs>
                            <rect x="5" y="5" rx="10" fill="none" stroke="url(#grad1)" width="120" height="50"></rect>
                        </svg>
                        <span>Se connecter</span>
                    </button>
                    <a class="forgot-passwd" href="#">Mot de passe oublié ?</a>
                    <div class="new-user">
                        <a href="#">Pas encore de compte ? Créer un compte</a>
                    </div>

                </div>
            </form>

        </div>

    </div>
    <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12 container-regi">
        <div class="card_regi">
            <?php if(isset($error)) { ?>
                <div class="alert alert-error">
                    <?= $error ?>
                </div>
            <?php } ?>
            <div class="regi">
                <h1>Je n'ai pas encore de compte</h1>
            </div>

            <form class="signin" method="post" action="#">
                <input type="hidden" name="signin" value="ok" />
                <div class="input_log">
                    <label for="lastname">Nom</label>
                    <input type="text" class="input" id="email" name="lastname" placeholder="Moulando" required spellcheck="false" autocomplete="off">
                </div>
                <div class="input_log">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="input" id="passwd" name="firstname" placeholder="Fabrice" required spellcheck="false" autocomplete="off">
                </div>
                <div class="input_log">
                    <label for="email">Identifiant / Adresse Mail</label>
                    <input type="email" class="input" id="email" name="email" placeholder="exemple@email.com" required spellcheck="false" autocomplete="off">
                </div>
                <div class="input_log">
                    <label for="passwd">Mot de passe</label>
                    <input type="password" class="input" id="passwd" name="passwd" placeholder="mot de passe" required spellcheck="false" autocomplete="off">
                </div>
                <div class="input_log">
                    <label for="passwd">Confirmer le mot de passe</label>
                    <input type="password" class="input" id="passwd" name="passwd" placeholder="mot de passe" required spellcheck="false" autocomplete="off">
                </div>
                <div class="register-container">
                    <button href="#" type="submit" class="btn">
                        <svg width="260" height="62">
                            <defs>
                                <linearGradient id="grad1">
                                    <stop offset="0%" stop-color="#2900FF"/>
                                    <stop offset="100%" stop-color="#2900FF" />
                                </linearGradient>
                            </defs>
                            <rect x="5" y="5" rx="10" fill="none" stroke="url(#grad1)" width="250" height="50"></rect>
                        </svg>
                        <span>Créer un compte</span>
                    </button>
                </div>
                <div class="details-regi">
                    <p>
                        En cliquant sur Créer un compte, vous acceptez notre <a href="#" class="cgu">politique de
                            confidentialité</a> applicable au traitement de vos données personnelles.
                    </p>
                </div>
            </form>

        </div>

    </div>

</section>
<?php
} else {
    header('Location: '.DOMAIN.'/admin');
}