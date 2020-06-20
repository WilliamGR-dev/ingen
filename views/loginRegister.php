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
<div class="loginRegister">
    <label><h1>Connexion / Inscription</h1></label>
    <div>
        <ul class="formSelection">
            <a href="#" id="buttonLogin" onclick="formLoginSelected();" class="buttonLogin"><li>Connexion</li></a>
            <a href="#" id="buttonRegister" onclick="formRegisterSelected();" class="buttonRegister"><li>Inscription</li></a>
        </ul>
        <div id="firstForm">
            <form method="post" action="index.php?p=login&action=login" id="formLogin" class="formLogin">
                <div><h2>Connexion</h2></div>
                <div>
                    <label>Adresse email : *<br></label>
                    <input type="email" name="email" placeholder="Email" >
                </div>
                <div>
                    <label>Mot de passe : *<br></label>
                    <input type="password" name="password" placeholder="Mot de passe" >
                </div>
                <div>
                    <a href="index.php?p=password">J'ai oublié mon mot de passe</a>
                </div>
                <?php if ($_GET['p'] == 'login'):if(isset($_SESSION['messages'])): ?>
                    <div>
                        <?php foreach($_SESSION['messages'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif;endif; ?>
                <div>
                    <button class="sumbit" type="submit"> Se Connecter</button>
                </div>
            </form>
        </div>
        <div id="secondForm">
            <form method="post" action="index.php?p=register&action=add" id="formRegister" class="formRegister">
                <div><h2>Inscription</h2></div>
                <div>
                    <label>Nom : *<br></label>
                    <input type="text" name="lastName" placeholder="Nom ..." value="<?php if(isset($_SESSION['old_inputs'])): echo $_SESSION['old_inputs']['lastName']; endif; ?>" >
                </div>
                <div>
                    <label>Prenom : *<br></label>
                    <input type="text" name="firstName" placeholder="Prenom ..." value="<?php if(isset($_SESSION['old_inputs'])): echo $_SESSION['old_inputs']['firstName']; endif; ?>" >
                </div>
                <div>
                    <label>Adresse email : *<br></label>
                    <input type="email" name="email" placeholder="Email ..." value="<?php if(isset($_SESSION['old_inputs'])): echo $_SESSION['old_inputs']['email']; endif; ?>" >
                </div>
                <div>
                    <label>Mot de passe : *<br></label>
                    <input type="password" name="password" placeholder="Mot de passe ..." value="<?php if(isset($_SESSION['old_inputs'])): echo $_SESSION['old_inputs']['password']; endif; ?>" >
                </div>
                <div>
                    <label>Telephone  : <br></label>
                    <input type="number" name="phoneNumber" placeholder="Telephone ..." class="phoneNumber" >
                </div>
                <?php if ($_GET['p'] == 'register'):if(isset($_SESSION['messages'])): ?>
                    <div>
                        <?php foreach($_SESSION['messages'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif;endif; ?>
                <div>
                    <button class="sumbit" type="submit"> S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<footer>
    <?php include './partials/footer_assets.php';?>
    <script src="./assets/js/login_register.js"></script>
    <script>
        <?php if($_GET['p'] == "login"){echo " formLoginSelected();";}?>
        <?php if($_GET['p'] == "register"){ echo "formRegisterSelected(); ";}?>
    </script>
</footer>
</html>