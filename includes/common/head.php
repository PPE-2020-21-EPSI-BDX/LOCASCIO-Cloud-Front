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
    <nav>
        <div class="logo">
            <a href="<?= DOMAIN ?>/">
                <div id="logo" style="mask-image:url('<?= DOMAIN ?>/assets/media/images/LogoV2.svg');-webkit-mask-image:url('<?= DOMAIN ?>/assets/media/images/LogoV2.svg');"></div>
            </a>
        </div>
        <ul class="nav-links">
            <li class="<?= ($uri == '/') ? 'active' : '' ?>">
                <a class="left txt-nav" href="<?= DOMAIN ?>/">Accueil</a>
            </li>
            <li class="<?= ($uri == '/a-propos') ? 'active' : '' ?>">
                <a class="left txt-nav" href="<?= DOMAIN ?>/a-propos">&Agrave; propos</a>
            </li>
            <li class="<?= ($uri == '/offers') ? 'active' : '' ?>">
                <a class="left txt-nav" href="<?= DOMAIN ?>/offers">Nos offres</a>
            </li>
            <li class="<?= ($uri == '/connexion') ? 'active' : '' ?>">
                <a class="left txt-nav" href="<?= DOMAIN ?>/connexion">Se Connecter</a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
<?php } ?>
<main onload="closeLoading()">
