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
    <label><h1>Recuperation Mot de passe</h1></label>
    <div>
        <div id="firstForm">
            <form method="post" action="index.php?p=password&action=send" id="formLogin" class="formLogin">
                <div><h2>Recuperation Mot de passe</h2></div>
                <div>
                    <label>Adresse email : *<br></label>
                    <input type="email" name="email" placeholder="Email" >
                </div>
                <?php if ($_GET['p'] == 'password'):if(isset($_SESSION['messages'])): ?>
                    <div>
                        <?php foreach($_SESSION['messages'] as $message): ?>
                            <?= $message ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif;endif; ?>
                <div>
                    <button class="sumbit" type="submit">Envoyer mail</button>
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