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
            <h2>Informations Legales</h2>
            <div class="information">
                <div class="info">
                    Site internet : www.ingen.com<br><br>

                    Editeur :InGen<br>
                    N° siren : 53359204400010<br>
                    Siège social : 122, allée Louis Blériot ZAC Aéroport Boos/Rouen 76520 Boos - France<br>
                    Capital social : € 5 €<br>
                    TVA Intra FR : FR82533592044<br>
                    Tél. : +33 (0)2 32 86 05 40<br>
                    Directeur de la publication : contact@ingen.com<br><br>


                    Droits d'auteurs - droits de reproduction<br><br>


                    Le site www.ingen.com relève de la législation française et internationale sur le droit d'auteur et la propriété intellectuelle. Tous les droits de reproduction y sont réservés, y compris les représentations iconographiques et photographiques.<br>

                    La présentation générale du site est originale et également protégée. Vous n'êtes donc pas autorisé à reproduire le code html des pages de ce serveur dans le but de diffusion publique.<br>

                    La reproduction de tout ou partie de ce site sur un support quel qu'il soit, est formellement interdite sauf autorisation expresse du directeur de la publication.<br>

                    Pour toute autre utilisation, vous pouvez contacter notre chargé de partenariat à l'adresse suivante : contact@ingen.com<br><br>


                    Ce site est hébergé par la société :<br>

                    Hébergement : Ovh France<br>
                    Adresse : 140 quai Sartel - 59100 Roubaix - France<br>
                    Téléphone : 0 820 698 765<br><br>


                    Il a été créé par la société :<br>

                    Réalisation : WILLIAM GIRARD-REYDET<br>
                    Adresse : 2 avenue du stade de Coubertin - 92100 Boulogne-Billancourt - France<br>
                    Création de site Internet : https://williamgirardreydet.dev/<br>
                    Téléphone : 06 52 20 16 69<br><br>


                    Crédits Photos :<br><br>

                    Photographe : Jurassic World Evolution<br>
                    Adresse : Isla Nublar <br>
                    Photographe à Isla Nublar : www.islanublar.com<br><br>


                    Copyright : ©INGEN<br><br>


                    Ce site est déclaré à la CNIL et porte le numéro d'autorisation : 18191716<br><br>

                    Conformément à la loi Informatiques et Liberté vous disposez d'un droit d'accès aux données vous concernant, sur simple demande écrite de votre part à notre siège social.</div>
            </div>
        </div>
    </div>
</div>
</body>



<?php include './partials/footer.php';?>