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
            <div><i class="fas fa-user-circle" aria-hidden="true"></i>Mon compte</div>
            <ul>
                <li><a href="index.php?p=profil">Information personnelles</a></li>
                <li><a href="index.php?p=profilAddress">Mes adresses</a></li>
                <li><a href="index.php?p=orders">Mes commandes</a></li>
                <li><a href="#">Mes commentaires</a></li>
                <li><a href="index.php?p=profil&action=disconnect">Se deconnecter</a></li>
            </ul>
        </div>
        <div class="userInformation">
            <?php if ($orders!=null): foreach ($orders as $order): ?>
            <div class="order">
                <table>
                    <tr>
                        <td colspan="4" style="text-align: center">Numero Commande : <?= $order['id'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Prenom/Nom</td>
                        <td colspan="2"><?= $order['name_user'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Adresse de livraison</td>
                        <td colspan="2"><?= $order['addressDelivery'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Adresse de facturation</td>
                        <td colspan="2"><?= $order['addressBill'] ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" colspan="4">
                            Info Commande
                        </td>
                    </tr>
                    <tr>
                        <td>Nom Produit</td>
                        <td>Quantité</td>
                        <td>Prix Unitaire</td>
                        <td>Total Prix</td>
                    </tr>
                    <?php
                    $product['name'] = explode(',',$order['product']);
                    $product['quantity'] = explode(',',$order['quantity']);
                    $product['price'] = explode(',',$order['price']);
                    $allPrice = 0;
                    for ($i = 0; $i < count($product['name']);$i++): ?>
                        <tr>
                            <td><?= $product['name'][$i] ?></td>
                            <td><?= $product['quantity'][$i] ?></td>
                            <td><?= $product['price'][$i] ?>$</td>
                            <td><?= ($product['price'][$i])*($product['quantity'][$i]) ?>$</td>
                        </tr>
                        <?php $allPrice = $allPrice+($product['price'][$i])*($product['quantity'][$i]); endfor; ?>
                    <tr>
                        <td style="text-align: center" colspan="4">
                            Total de la commande
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center" colspan="4">
                            <?= $allPrice ?>$
                        </td>
                    </tr>
                </table>
            </div>
            <?php endforeach;else: echo 'Aucune Commande'; endif;?>
        </div>
    </div>
</div>
<?php include './partials/footer.php';?>
</body>
<footer>
    <?php include './partials/footer_assets.php';?>
</footer>
</html>
