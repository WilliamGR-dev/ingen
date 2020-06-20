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
<form action="./index.php?card=delivery&action=add" method="post">
<div style="min-height: 90vh;display: flex;flex-direction: column;align-items: center;justify-content: flex-start;">
    <div class="allStep">
        <div class="firstStep stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Mon Panier</div>
        <div class="stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Connexion</div>
        <div class="stepHidden"><span class="checkStep"><i class="fas fa-check"></i></span> Coordonnées</div>
        <div><span class="checkStep">4</span> Livraison</div>
        <div class="lastStep stepHidden"><span class="checkStep">5</span> Paiement</div>
    </div>
    <div class="deliveryInformation">
        <h1>Livraison Gratuite</h1>
        Veuillez remplir ces informations si vous voulez etre contacté lors de la recepection de la livraison<br>
        <div>
            Numero:
            <input placeholder="Numero" name="number" type="number" value="<?php if (isset($_POST['number'])): echo $_POST['number']; endif; ?>">
        </div>
        <?php if (isset($_SESSION['messages'])): echo $_SESSION['messages']['0']; endif; ?>
    </div>

    <div class="sumbitCard"><button type="submit" class="confirmCard">Suivant</button></div>
</div>
</form>
<?php include './partials/footer.php';?>
</body>
<footer>
    <?php include './partials/footer_assets.php';?>
</footer>
</html>
