<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InGen</title>
    <?php include './partials/head_assets.php'?>
    <script src="https://kit.fontawesome.com/1a0598dab9.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <?php if(isset($_SESSION['user'])): if ($_SESSION['user']['is_admin']==1): include './partials/nav_admin.php'; else: include './partials/nav.php'; endif; else: include './partials/nav.php'; endif;  ?>
</header>
<div style="height: 10vh;"></div>
<div style="min-height: 90vh;display: flex;flex-direction: column;align-items: center;justify-content: flex-start;">
    <div class="profil">
        <div class="menuProfil">
            <div><h1>InGen</h1></div>
            <ul>
                <li><a href="index.php?p=contact">Nous contacter</a></li>
                <li><a href="index.php?p=cgv">CGV</a></li>
                <li><a href="index.php?p=info">Informations légales</a></li>
            </ul>
        </div>
        <div class="userInformation">
            <h2>Nous Contacter</h2>
            <div class="information">Besoin d’un renseignement ? Merci de remplir le formulaire ci-dessous ou de nous contacter par mail à l’adresse contact@budo-fight.com. Nous vous répondrons dans les plus brefs délais. Notre service client se tient également à votre disposition du lundi au vendredi de 9h à 12h et de 14h à 18h au 02 32 86 05 40.</div>
            <div class="informationPratique">
                <div><h4>Information Pratique</h4></div>
                <div>
                    122, allée Louis Blériot
                    ZAC Aéroport Boos/Rouen
                    76520 Boos - France
                </div>
                <div>
                    Tél : +33 02 32 86 05 40
                    E-mail : contact@budo-fight.com
                </div>
            </div>
        </div>
    </div>
</div>
</body>



<?php include './partials/footer.php';?>