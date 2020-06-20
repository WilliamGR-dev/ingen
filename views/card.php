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
<form action="index.php?p=card&action=confirm" method="post">
<div style="min-height: 90vh;display: flex;flex-direction: column;align-items: center;justify-content: flex-start;">
    <div class="allStep">
        <div class="firstStep"><span class="checkStep">1</span> Mon Panier</div>
        <div class="stepHidden"><span class="checkStep">2</span> Connexion</div>
        <div class="stepHidden"><span class="checkStep">3</span> Coordonnées</div>
        <div class="stepHidden"><span class="checkStep">4</span> Livraison</div>
        <div class="lastStep stepHidden"><span class="checkStep">5</span> Paiement</div>
    </div>
    <div class="cardInformation">
        <div class="cardProducts">
            <span>Production</span>
            <span>Description</span>
            <span>Prix Unitaire</span>
            <span>Quantité</span>
            <span>Total</span>
            <?php  if (isset($_SESSION['card'])): foreach ($_SESSION['card'] as $key => $product): ?>
            <div class="cardProduct">
                <div class="cancelProduct"><a href="index.php?p=card&action=delete&product_id=<?= $key ?>"><i class="far fa-window-close"></i></a> <img src="./assets/img/products/<?= $product['name'] ?>/photoProduit/thumb.png" alt="<?= $product['name'] ?>"></div>
                <div class="infoProduct"><a href="index.php?p=product&product_id=1"><?= $product['name']?></a><h5>Couleur : <?= $product['color'] ?></h5></div>
                <div id="priceUnity<?= $key ?>" title="<?= $product['price'] ?>"><?=  number_format($product['price'], 0, ',', ' '); ?>$</div>
                <div><div><div class="number-input">
                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown();changePrice(<?= $key ?>);" ></button>
                            <input id="quantity<?= $key ?>" onchange="checkQuantity(this);changePrice(<?= $key ?>);" class="quantity" min="1" name="quantity<?= $key ?>" value="<?= $product['quantity'] ?>" type="number">
                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); changePrice(<?= $key ?>);" class="plus"></button>
                        </div></div></div>
                <div id="price<?= $key ?>" title="<?= $product['price']* $product['quantity'] ?>"><?= number_format($product['price']* $product['quantity'] , 0, ',', ' ');?>$</div>
            </div>
            <?php $totalCard = $totalCard+($product['price']*$product['quantity']); endforeach;else: echo 'Aucun Produit'; endif;?>
        </div>
        <div class="informationPrice">
            <div class="informationPayement">
                <div>
                    <h3>MÉTHODES DE PAIEMENT ACCEPTÉES</h3>
                    <div class="cardAuthorize"><i class="fab fa-cc-mastercard"></i><i class="fab fa-cc-visa"></i><i class="fab fa-cc-jcb"></i><i class="fab fa-cc-discover"></i><i class="fab fa-cc-amex"></i></div>
                    <h3>Livraison</h3>
                    <pre class="cardDelivery"> <i class="fas fa-globe-africa"></i> <span>Livraison international</span>               <i class="fas fa-truck-loading"></i> <span>Livraison sous-48h</span></pre>
                </div>
            </div>
            <div class="cardPrice">
                <div><div>Total des articles</div><div id="totalProducts" title="<?= $totalCard ?>"><?= number_format($totalCard, 0, ',', ' '); ?>‬ $</div></div>
                <div><div>Frais de port</div><div>‭0‬ $</div></div>
                <div><div>Total HT</div><div id="totalHt"><?= number_format($totalCard, 0, ',', ' '); ?>‬ $</div></div>
                <div><div>TVA 20%</div><div id="totalTva"><?= number_format($taxe = ($totalCard*0.20) , 0, ',', ' '); ?> $</div></div>
                <div><div>Total TTC</div><div id="totalTtc"><?= number_format($taxe+$totalCard , 0, ',', ' '); ?> $</div></div>
            </div>
        </div>
    </div>
    <div class="sumbitCard"><button type="submit" class="confirmCard">Je valide mon panier</button></div>
</div>
</form>
<?php include './partials/footer.php';?>
</body>
<footer>
    <script src="./assets/js/cart.js"></script>
    <?php include './partials/footer_assets.php';?>
</footer>
</html>
