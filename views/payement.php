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
    <div class="allStep">
        <div class="firstStep stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Mon Panier</div>
        <div class="stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Connexion</div>
        <div class="stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Coordonnées</div>
        <div class="stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Livraison</div>
        <div class="lastStep"><span class="checkStep">5</span> Paiement</div>
    </div>
    <form action="index.php?card=payement&action=add" method="post" style="width:80%">
        <div class="allPayement" style="width:100%">
            <h1>Choix du mode de Payement</h1>
            <div class="selectPayement">
                <div class="optionPayement">
                    <div><i class="far fa-credit-card"></i></div>
                    <div><input onclick="oneChoice(this);" type="checkbox" name="cardPayement" id="cardPayement"><label class="checkboxPayement" for="cardPayement">Carte Bancaire</label></div>
                </div>
                <div class="optionPayement">
                    <div><i class="fab fa-cc-paypal"></i></div>
                    <div><input onclick="oneChoice2(this);" type="checkbox" name="paypalPayement" id="paypalPayement"><label class="checkboxPayement" for="paypalPayement">Paypal</label></div>
                </div>
            </div>
        </div>

        <div class="sumbitCard"><form action="./index.php?card=payement" method="post"><button type="submit" class="confirmCard">Suivant</button></form></div>
    </form>
</div>
<?php include './partials/footer.php';?>
</body>
<footer>
    <?php include './partials/footer_assets.php';?>
    <script src="./assets/js/cart.js"></script>
</footer>
</html>

