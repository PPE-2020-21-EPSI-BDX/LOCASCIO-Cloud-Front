<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <meta name="referrer" content="origin-when-cross-origin">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-tap-highlight" content="no">
    <?php if (!defined('MAINTENANCE') && !defined('ERROR_404')) { ?>
    <title>LOCASCIO Cloud - <?= (ucfirst(str_replace('-', ' ', $segments[1])) ? ucfirst(str_replace('-', ' ', $segments[1])) : 'Accueil') ?></title>
    <?php } else if (defined('MAINTENANCE') && !defined('ERROR_404')) { ?>
    <title>Maintenance</title>
    <?php } else if (!defined('MAINTENANCE') && defined('ERROR_404')) { ?>
    <title>Erreur 404</title>
    <?php } ?>
    <link rel="icon" href="<?= DOMAIN ?>/assets/media/images/logo_Locascio_Cloud.png">
    <link rel="stylesheet" href="<?= DOMAIN ?>/assets/css/default/style.css">
</head>
<body>
<?php if (!defined('MAINTENANCE') && !defined('ERROR_404') && !defined('ADMIN')) { ?>
<header>
    <div id="burger-container">
        <img id="logo" src="<?= DOMAIN ?>/assets/media/images/logo_Locascio_Cloud.png" alt="logo">
        <div id="burger">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </div>
    </div>
    <nav class="stroke">
        <div class="logo-nav">
            <a href="<?= DOMAIN ?>/"><img src="<?= DOMAIN ?>/assets/media/images/logo_Locascio_Cloud.png" alt="logo"></a>
        </div>
        <ul>
            <li class="<?= ($uri == '/') ? 'active' : '' ?>">
                <a class="txt-nav" href="<?= DOMAIN ?>/">Accueil</a>
            </li>
            <li class="<?= ($uri == '/a-propos') ? 'active' : '' ?>">
                <a class="txt-nav" href="<?= DOMAIN ?>/a-propos">&Agrave; propos</a>
            </li>
            <li class="<?= ($uri == '/contact') ? 'active' : '' ?>">
                <a class="txt-nav" href="<?= DOMAIN ?>/contact">Nos offres</a>
            </li>
            <li class="<?= ($uri == '/connexion') ? 'active' : '' ?>">
                <a class="txt-nav" href="<?= DOMAIN ?>/connexion">Se Connecter</a>
            </li>
        </ul>
    </nav>
</header>
<?php } ?>
<main onload="closeLoading()">
