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
            Formulaire Utilisateur<br><br>

            - Prenom (champ text)<br>
            - Nom (champ text)<br>
            - Admin (select area)<br>
            - Email (champ text)<br><br>

            <form action="index.php?admin=users&action=<?= isset($user) ? 'edit&id='.$user['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

                <label for="name">Prenom :</label>
                <input  type="text" name="first_name" id="first_name" value="<?php if(isset($_SESSION['old_inputs'])):?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['first_name'] : ''; ?><?php else: ?><?= isset($user) ? $user['first_name'] : '';  endif;?>" /><br>

                <label for="name">Nom :</label>
                <input  type="text" name="last_name" id="last_name" value="<?php if(isset($_SESSION['old_inputs'])):?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['last_name'] : ''; ?><?php else: ?><?= isset($user) ? $user['last_name'] : '';  endif;?>" /><br>

                <label for="name">Admin :</label>
                <select name="is_admin" id="is_admin">
                    <option value="1" <?php if(isset($user)): if($user['is_admin']==1): echo 'selected';  endif;endif;?>>Oui</option>
                    <option value="0" <?php if(isset($user)): if($user['is_admin']==0): echo 'selected';  endif;endif;?>>Non</option>
                </select><br>

                <label for="name">Email :</label>
                <input  type="email" name="email" id="email" value="<?php if(isset($_SESSION['old_inputs'])):?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : ''; ?><?php else: ?><?= isset($user) ? $user['email'] : '';  endif;?>" /><br>

                <input type="submit" value="Enregistrer" />

            </form>

        </div>
    </div>
</div>
</body>



<?php include './partials/footer.php';?>

