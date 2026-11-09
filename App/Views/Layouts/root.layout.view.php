<?php

/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Villa Lúka – výnimočné miesto pre svadby a oslavy v Malých Karpatoch.">
    <title>Villa Lúka</title>
    <link rel="icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/domov.css') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/o-nas.css') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/reservations.css') ?>">
</head>
<body>
<header class="site-header">
    <a class="brand" href="<?= $link->url('home.index') ?>" aria-label="Villa Lúka – domov">
        <span class="brand-name">villa lúka</span>
        <span class="brand-caption">miesto pre vaše áno</span>
    </a>
    <nav class="main-nav" aria-label="Hlavná navigácia">
        <a href="<?= $link->url('home.index') ?>">Domov</a>
        <a href="<?= $link->url('home.about') ?>">O nás</a>
        <a href="<?= $link->url('home.index') ?>#galeria">Galéria</a>
        <a href="<?= $link->url('home.index') ?>#baliky">Balíky</a>
        <a href="<?= $link->url('home.index') ?>#pribehy">Recenzie</a>
        <a href="<?= $link->url('reservation.index') ?>">Rezervácie</a>
        <a href="<?= $link->url('manager.index') ?>">Správa</a>
        <a href="<?= $link->url('home.index') ?>#kontakt">Kontakt</a>
    </nav>
    <div class="header-actions">
        <a class="login-link" href="<?= $link->url('auth.login') ?>">Prihlásenie</a>
        <a class="button button-small" href="<?= $link->url('home.index') ?>#kontakt">Predbežná rezervácia</a>
    </div>
 </header>

<main>
    <?= $contentHTML ?>
</main>

<footer class="site-footer">
    <div class="content-width footer-grid">
        <div>
            <a class="brand footer-brand" href="<?= $link->url('home.index') ?>"><span class="brand-name">villa lúka</span></a>
            <p>Výnimočné chvíle. Prirodzené krásno. Svadobný priestor v srdci Malých Karpát.</p>
        </div>
        <div>
            <h2>Objavte Villa Lúka</h2>
            <a href="<?= $link->url('home.about') ?>">O nás a našom priestore</a>
            <a href="<?= $link->url('home.index') ?>#galeria">Galéria príbehov</a>
            <a href="<?= $link->url('home.index') ?>#baliky">Cenník a balíky</a>
            <a href="<?= $link->url('home.index') ?>#pribehy">Recenzie párov</a>
        </div>
        <div>
            <h2>Sme tu pre vás</h2>
            <a href="mailto:ahoj@villaluka.example">ahoj@villaluka.example</a>
            <a href="tel:+421900123456">+421 900 123 456</a>
            <p>Záhradná 18, 900 01 Modra</p>
        </div>
        <div>
            <h2>Zostaňme v spojení</h2>
            <p>Instagram &nbsp; ↗ &nbsp; Facebook &nbsp; ↗</p>
            <p>Osobné obhliadky po dohode. Tešíme sa na váš príbeh.</p>
        </div>
    </div>
    <div class="content-width footer-bottom">
        <span>© 2026 Villa Lúka · Fiktívna značka. Ceny, kontakty a recenzie sú ilustračné.</span>
        <span>Ochrana súkromia &nbsp; Podmienky rezervácie &nbsp; Cookies</span>
    </div>
</footer>
</body>
</html>
