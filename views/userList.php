
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

            <?php if(isset($_SESSION['messages'])): ?>
                <div>
                    <?php foreach($_SESSION['messages'] as $message): ?>
                        <?= $message ?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <h2>Liste Users : </h2>

            <table class="userList">
                <tr>
                    <td>#</td>
                    <td>Prenom</td>
                    <td>Nom</td>
                    <td>Email</td>
                    <td>Admin</td>
                    <td>Action</td>
                </tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?=  $user['id'] ?></td>
                        <td><?=  $user['first_name'] ?></td>
                        <td><?=  $user['last_name'] ?></td>
                        <td><?=  $user['email'] ?></td>
                        <td><?=  $user['is_admin'] ?></td>
                        <td>
                            <a href="index.php?admin=users&action=edit&id=<?= $user['id'] ?>">modifier</a>
                            <a href="index.php?admin=users&action=delete&id=<?= $user['id'] ?>">supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>
</body>



<?php include './partials/footer.php';?>

