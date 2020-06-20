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
    <?php include './partials/nav_admin.php'; ?>
</header>
<div style="height: 10vh;"></div>
<div style="min-height: 90vh;display: flex;flex-direction: column;align-items: center;justify-content: flex-start;">
    <div class="profil">
        <div class="menuProfil">
            <div><i class="fas fa-user-circle" aria-hidden="true"></i>Tableau de bord de l'admin</div>
            <ul>
                <li><a href="index.php?admin=users&action=list">Utilisateurs</a></li>
                <li><a href="index.php?admin=categories&action=list">Categories</a></li>
                <li><a href="index.php?admin=products&action=list">Produits</a></li>
                <li><a href="index.php?admin=productColor&action=list">Couleurs</a></li>
                <li><a href="index.php?admin=orders&action=list">Commandes</a></li>
                <li><a href="index.php?p=profil&action=disconnect">Se deconnecter</a></li>
            </ul>
        </div>
        <div class="userInformation">
            <div class="order">
                <table  class="userList">
                <tr>
                    <td style="text-align: center" colspan="5">
                        Info User
                    </td>
                </tr>
                <tr>
                    <td>Prenom/Nom</td>
                    <td>Adresse de livraison</td>
                    <td>Adresse de payement</td>
                    <td>Email</td>
                </tr>
                <tr>
                    <td><?= $order['name_user'] ?></td>
                    <td><?= $order['addressDelivery'] ?></td>
                    <td><?= $order['addressBill'] ?></td>
                    <td><?= $user['email'] ?></td>
                </tr>
            </table>
            </div>
            <div class="order">
                <table class="userList">
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
                <?php $allPrice = 0; for ($i = 0; $i < count($product['name']);$i++): ?>
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

        </div>
    </div>
</div>
</body>



<?php include './partials/footer.php';?>

