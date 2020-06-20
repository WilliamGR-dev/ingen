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
            <div class="addressInfo">
                <div class="addressComponment">
                    <form class="editAddress" action="index.php?p=profilAddress&action=modify" method="post">
                        <select onchange="selectAddress()" name="addressSelected" id="allAddress">
                            <?php if (!empty($allAddress)): foreach ($allAddress as $address): ?>
                                <option value="<?= $address['id'] ?>" > <?= $address['first_name'].' '.$address['last_name'].','.$address['zip_code'].','.$address['city'] ?></option>
                            <?php endforeach;else: ?>
                                <option> Aucune adresse</option>
                            <?php endif; ?>
                        </select>
                        <button id="modifyAddress" type="submit" class="addressModify">Modifier</button>
                    </form>
                    <button id="addAddress" class="addressAdd">Ajouter une adresse</button>
                    <dialog id="infoModifyAddress" class="infoAddProduct">
                        <form action="index.php?p=profilAddress&action=edit&address_id=<?php  if (isset($addressModify)): echo $addressModify['id']; endif;?>" method="post">
                            <div>
                                <h1>Modifier une adresse</h1>
                                <div class="allInfoAddress">
                                    <div>
                                        <div class="addressInput">
                                            <span>Nom*</span>
                                            <input type="text" id="name" name="last_name" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['last_name'])): echo $_POST['last_name']; endif; if (isset($addressModify)): echo $addressModify['last_name']; endif;?>" placeholder="Votre nom" required>
                                        </div>
                                        <div class="addressInput">
                                            <span>Prenom*</span>
                                            <input type="text" id="lastName" name="first_name" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['first_name'])): echo $_POST['first_name']; endif;  if (isset($addressModify)): echo $addressModify['first_name']; endif;?>" placeholder="Votre prénom" required>
                                        </div>
                                        <div class="addressInput">
                                            <span>Société</span>
                                            <input type="text" id="society" name="society" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['society'])): echo $_POST['society']; endif; if (isset($addressModify)): echo $addressModify['society']; endif;?>"" placeholder="Votre Société">
                                        </div>
                                    </div>
                                    <div class="addressInfoUser">
                                        <div>
                                            <span>Adresse*</span>
                                            <input type="text" id="address" name="address" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['address'])): echo $_POST['address']; endif;  if (isset($addressModify)): echo $addressModify['address']; endif;?>" placeholder="Votre Adresse" required>
                                        </div>
                                        <div>
                                            <span>Adresse(complément)*</span>
                                            <input type="text" id="addressPlus" name="address_plus" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['address_plus'])): echo $_POST['address_plus']; endif;  if (isset($addressModify)): echo $addressModify['address_plus']; endif;?>" placeholder="Complément d'adresse">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="addressInput">
                                            <span>Code postal*</span>
                                            <input type="text" id="zipCode" name="zip_code" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['zip_code'])): echo $_POST['zip_code']; endif;  if (isset($addressModify)): echo $addressModify['zip_code']; endif;?>" placeholder="Votre Code Postal" required>
                                        </div>
                                        <div class="addressInput">
                                            <span>Ville*</span>
                                            <input type="text" id="city" name="city" value="<?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['city'])): echo $_POST['city']; endif;  if (isset($addressModify)): echo $addressModify['city']; endif;?>" placeholder="Votre Ville" required>
                                        </div>
                                        <div class="addressInput">
                                            <span>Pays</span>
                                            <select name="countries">
                                                <?php foreach ($countries as $country): ?>
                                                    <option <?php if (isset($_GET['action']) && isset($_GET['address_id']) && isset($_POST['countries'])): if ($_POST['countries']==$country): echo 'selected'; endif;endif; if (isset($addressModify)): if ($country==$addressModify['country']): echo 'selected'; endif;endif;?>>
                                                        <?= $country ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttonsDialog"><a><button type="reset" onclick="infoModifyAddress.close()" class="buttonDialog">Fermer</button></a><a><button class="buttonDialog" type="submit">Modifier</button></a></div>
                            </div>
                        </form>
                    </dialog>
                    <dialog id="infoAddAddress" class="infoAddProduct">
                        <div>
                            <form method="post" action="index.php?p=profilAddress&action=add">
                                <h1>Ajouter une adresse</h1>
                                <div class="allInfoAddress">
                                    <div>
                                        <div class="addressInput">
                                            <span>Nom*</span>
                                            <input type="text" name="lastName" placeholder="Votre nom">
                                        </div>
                                        <div class="addressInput">
                                            <span>Prenom*</span>
                                            <input type="text" name="firstName" placeholder="Votre prénom" >
                                        </div>
                                        <div class="addressInput">
                                            <span>Société</span>
                                            <input type="text" name="society" placeholder="Votre Société">
                                        </div>
                                    </div>
                                    <div class="addressInfoUser">
                                        <div>
                                            <span>Adresse*</span>
                                            <input type="text" name="address" placeholder="Votre Adresse" >
                                        </div>
                                        <div>
                                            <span>Adresse(complément)*</span>
                                            <input type="text" name="addressPlus" placeholder="Complément d'adresse">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="addressInput">
                                            <span>Code postal*</span>
                                            <input type="text" name="zipCode" placeholder="Votre Code Postal" >
                                        </div>
                                        <div class="addressInput">
                                            <span>Ville*</span>
                                            <input type="text" name="city" placeholder="Votre Ville" >
                                        </div>
                                        <div class="addressInput">
                                            <span>Pays</span>
                                            <select name="countries">
                                                <?php foreach ($countries as $country): ?>
                                                <option>
                                                    <?= $country ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if ($_GET['p'] == 'profilAddress'):if(isset($_SESSION['messages'])): ?>
                                        <div>
                                            <?php foreach($_SESSION['messages'] as $message): ?>
                                                <?= $message ?><br>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif;endif; ?>
                                </div>
                                <div class="buttonsDialog"><a><button type="reset" onclick="infoAddAddress.close()" class="buttonDialog">Fermer</button></a><a><button type="submit" class="buttonDialog">Ajouter</button></a></div>
                            </form>
                            </div>
                    </dialog>
                </div>
                <div class="addressUser">
                    <i class="fas fa-map-marked-alt"></i>
                    <div id="displayAddress">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './partials/footer.php';?>
</body>
<footer>
    <?php include './partials/footer_assets.php';?>
    <script src="./assets/js/profilAddress.js"></script>
    <?php if (isset($addressModify)):?>
        <?= "<script>openModalModify()</script>"?>
    <?php endif;?>
    <?php if (!empty($allAddress)): ?>
    <?= "<script>selectChild();selectAddress()</script>" ?>
    <?php endif; ?>
    <?php if (!empty($_SESSION['messages'])):?>
    <?= "<script>openModalAdd()</script>"?>
    <?php endif;?>
</footer>
</html>
