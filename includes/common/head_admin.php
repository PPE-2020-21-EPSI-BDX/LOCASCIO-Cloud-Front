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
    <link rel="stylesheet" href="<?= DOMAIN ?>/assets/css/admin/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
</head>
<body>
<?php if (!defined('MAINTENANCE') && !defined('ERROR_404')) { ?>
<header>
    <nav>
        <div class="logo-nav"></div>
        <ul>
            <li class="<?= ($uri == '/') ? 'active' : '' ?>">
                <a class="txt-nav" href="<?= DOMAIN ?>/">Accueil</a>
            </li>
        </ul>
    </nav>
</header>
<?php } ?>
<main>
    <div class="sidebar">
        <div class="sidebar__item_big">
            <div class="sidebar__item_big_symbol" style="mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');-webkit-mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');"></div>
            <div class="sidebar__item_big_name">Maxime BAUDOIN</div>
        </div>
        <div class="sidebar__separator"></div>
        <div class="sidebar__item active">
            <div class="sidebar__item_symbol" style="mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');-webkit-mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');"></div>
            <div class="sidebar__item_name">DASHBOARD</div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__item_symbol" style="mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');-webkit-mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');"></div>
            <div class="sidebar__item_name">CONFIGURATION</div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__item_symbol" style="mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');-webkit-mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');"></div>
            <div class="sidebar__item_name">MON COMPTE</div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__item_symbol" style="mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');-webkit-mask-image:url('<?= DOMAIN ?>/assets/media/images/dashboard.svg');"></div>
            <div class="sidebar__item_name">DASHBOARD</div>
        </div>
    </div>