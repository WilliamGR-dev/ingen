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
            <form action="index.php?p=profil&action=edit" method="post">
                <div class="userName">
                    <div>
                        <span>Nom : *</span>
                        <input type="text" name="lastName" value="<?= $user['last_name']?>" placeholder="Nom ... ">
                    </div>
                    <div>
                        <span>Prenom : *</span>
                        <input type="text" name="firstName" value="<?= $user['first_name']?>" placeholder="Prenom ... ">
                    </div>
                </div>
                <div class="userContact">
                    <div>
                        <span>Email : *</span>
                        <input type="text" name="email" value="<?= $user['email']?>" placeholder="Email ... ">
                    </div>
                    <div>
                        <span>Telephone :</span>
                        <input type="text" name="phoneNumber" value="<?php if ($user['phone_number'] != '0'): echo '0'.$user['phone_number']; endif; ?>" placeholder="Numero de telephone ... ">
                    </div>
                </div>
                <div class="userPassword">
                    <div>
                        <span>Ancien mot de passe : </span>
                        <input type="text" name="oldPassword" placeholder="Mot de passe ... ">
                    </div>
                    <div>
                        <span>Nouveau mot de passe : </span>
                        <input type="text" name="newPassword" placeholder="Mot de passe ... ">
                    </div>
                    <div>
                        <span>Confirmer mot de passe : </span>
                        <input type="text" name="newConfirmPassword" placeholder="Mot de passe ... ">
                    </div>
                </div>
                <?php if ($_GET['p'] == 'profil'):if(isset($messages)): ?>
                    <div>
                        <?php foreach($messages as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif;endif; ?>
                <div>
                    <button class="sumbit" type="submit">Mettre a jour les informations</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include './partials/footer.php';?>
</body>
<footer>
    <?php include './partials/footer_assets.php';?>
</footer>
</html>
