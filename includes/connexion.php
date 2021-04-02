





<section id="login">
    <div class="xLarge-6 large-6 medium-6 small-6 xSmall-6 container-log">
        <div class="card_log">
            <div class="welcome">
                <h1>Bienvenue !</h1>
            </div>

            <form class="login" method="post" action="#">
            <div class="input_log">
                <label for="email">Identifiant / Adresse Mail</label>
                <input type="email" class="input" id="email" name="email" placeholder="exemple@email.com" required spellcheck="false" autocomplete="off">
            </div>
            <div class="input_log">
                <label for="passwd">Mot de passe</label>
                <input type="password" class="input" id="passwd" name="passwd" placeholder="mot de passe" required spellcheck="false" autocomplete="off">
            </div>
            <div class="remember">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
                <p id="remember-txt">Se souvenir de moi</p>
            </div>
            <div class="connexion-container">
                <button href="#" class="btn_log">
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
    <div class="xLarge-6 large-6 medium-6 small-6 xSmall-6 container-regi">
        <div class="card_regi">
            <div class="regi">
                <h1>Je n'ai pas encore de compte</h1>
            </div>

            <form class="login" method="post" action="#">
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
                    <button href="#" class="btn">
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
            </form>

        </div>

    </div>

</section>
