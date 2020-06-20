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
        <div><span class="checkStep">2</span> Connexion</div>
        <div class="stepHidden"><span class="checkStep">3</span> Coordonnées</div>
        <div class="stepHidden"><span class="checkStep">4</span> Livraison</div>
        <div class="lastStep stepHidden"><span class="checkStep">5</span> Paiement</div>
    </div>
    <div class="cardInformation">
        <div class="cardLogin">
            <label><h1>Connexion / Inscription</h1></label>
            <div>
                <ul class="formSelection">
                    <a href="#" id="buttonLogin" onclick="formLoginSelected();" class="buttonLogin"><li>Connexion</li></a>
                    <a href="#" id="buttonRegister" onclick="formRegisterSelected();" class="buttonRegister"><li>Inscription</li></a>
                </ul>
                <div id="firstForm">
                    <form id="formLogin" class="formLogin">
                        <div><h2>Connexion</h2></div>
                        <div>
                            <label>Adresse email : *<br></label>
                            <input type="email" placeholder="Email" required>
                        </div>
                        <div>
                            <label>Mot de passe : *<br></label>
                            <input type="password" placeholder="Mot de passe" required>
                        </div>
                        <div>
                            <a href="#">J'ai oublié mon mot de passe</a>
                        </div>
                        <div>
                            <button class="sumbit" type="submit"> Se Connecter</button>
                        </div>
                    </form>
                </div>
                <div id="secondForm">
                    <form id="formRegister" class="formRegister">
                        <div><h2>Inscription</h2></div>
                        <div>
                            <label>Nom : *<br></label>
                            <input type="text" placeholder="Nom ..." required>
                        </div>
                        <div>
                            <label>Prenom : *<br></label>
                            <input type="text" placeholder="Prenom ..." required>
                        </div>
                        <div>
                            <label>Adresse  : *<br></label>
                            <input type="text" placeholder="Adresse Postal ..." required>
                        </div>
                        <div>
                            <label>Adresse email : *<br></label>
                            <input type="email" placeholder="Email ..." required>
                        </div>
                        <div>
                            <label>Mot de passe : *<br></label>
                            <input type="password" placeholder="Mot de passe ..." required>
                        </div>
                        <div>
                            <button class="sumbit" type="submit"> S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './partials/footer.php';?>
</body>
<footer>
    <?php include './partials/footer_assets.php';?>
    <script src="./assets/js/login_register.js"></script>
</footer>
</html>
