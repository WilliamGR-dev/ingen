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
            Formulaire Produit<br><br>

            - Nom (champ text)<br>
            - Description (champ text)<br>
            - Régime alimentaire (champ text)<br>
            - Groupe social (champ text)<br>
            - Image produit (champ file)<br>
            - Images descriptions (champ file)<br>
            - Couleur basique (champ file)<br>
            - Surface exigé (champ text)<br>
            - Poids (champ text)<br>
            - Longueur (champ text)<br>
            - Taille (champ text)<br>
            - Prix (champ text)<br>
            - Categorie (select area)<br>
            - Publication (select area)<br><br>

            <form action="index.php?admin=products&action=add" method="post" enctype="multipart/form-data">

                <label for="name">Nom :</label>
                <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : ''; ?>" /><br>

                <label for="name">Description :</label>
                <input  type="text" name="description" id="description" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : ''; ?>" /><br>

                <label for="name">Régime alimentaire :</label>
                <input  type="text" name="diet" id="diet" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['diet'] : ''; ?>" /><br>

                <label for="name">Groupe social :</label>
                <select name="social_group">
                    <option value="solitary">Solitaire</option>
                    <option value="couple">Couple</option>
                    <option value="groupe">Groupe</option>
                </select><br>

                <label for="name">Image produit :</label>
                <input  type="file" name="thumb" id="thumb" /><br>

                <label for="name">Image Description 1 :</label>
                <input  type="file" name="desc2" id="desc2" /><br>

                <label for="name">Image Description 2 :</label>
                <input  type="file" name="desc3" id="desc3" /><br>

                <label for="name">Image Description 3 :</label>
                <input  type="file" name="desc4" id="desc4" /><br>

                <label for="name">Image Description 4 :</label>
                <input  type="file" name="desc5" id="desc5" /><br>

                <label for="name">Echelle :</label>
                <input  type="file" name="size" id="size" /><br>

                <label for="name">Couleur basique :</label>
                <input  type="file" name="colorNull" id="colorNull" /><br>

                <label for="name">Surface Exigé :</label>
                <input  type="number" name="area_required" id="area_required" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['area_required'] : ''; ?>" />m²<br>

                <label for="name">Poids :</label>
                <input  type="number" step="0.01" name="weight" id="weight" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['weight'] : ''; ?>" />kg<br>

                <label for="name">Longueur :</label>
                <input  type="number" name="length" step="0.01" id="length" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['length'] : ''; ?>" />m<br>

                <label for="name">Taille :</label>
                <input  type="number" name="height" step="0.01" id="height" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['height'] : ''; ?>" />m<br>

                <label for="name">Prix :</label>
                <input  type="number" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : ''; ?>" />$<br>

                <label>Quantité :</label>
                <input  type="number" name="quantity" id="quantity" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : ''; ?>" /><br>


                <label for="name">Categorie :</label>
                <select name="category_id" id="category_id">
                    <?php foreach ($categories as $category): ?>
                    <option  value="<?= $category['id'] ?>" ><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="name">Publication :</label>
                <select name="publish" id="publish">
                    <option value="1" >Oui</option>
                    <option value="0">Non</option>
                </select><br>

                <input type="submit" value="Enregistrer" />

            </form>
        </div>
    </div>
</div>
<script>

</script>
<footer>
    <?php include './partials/footer.php';?>
    <script src="./assets/js/productForm.js"></script>
</footer>
</body>
</html>



