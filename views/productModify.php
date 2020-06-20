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
            - Publication (select area<br><br>

            <h2>Formulaire Info</h2>
            <form action="index.php?admin=products&action=edit&form=info&id=<?= $productSelected['id'] ?>" method="post" enctype="multipart/form-data">

                <label>Nom :</label>
                <input  type="text" name="name" id="name" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : ''; ?><?php else: ?><?= $productSelected['name'] ?><?php endif;?>" /><br>

                <label>Description :</label>
                <input  type="text" name="description" id="description" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : ''; ?><?php else: ?><?= $productSelected['description'] ?><?php endif;?>" /><br>

                <label>Régime alimentaire :</label>
                <input  type="text" name="diet" id="diet" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['diet'] : ''; ?><?php else: ?><?= $productSelected['diet'] ?><?php endif;?>" /><br>

                <label>Groupe social :</label>
                <select name="social_group">
                    <option value="solitary" <?= $productSelected['social_group']=='solitary' ? 'selected' : '' ?> >Solitaire</option>
                    <option value="couple" <?= $productSelected['social_group']=='couple' ? 'selected' : '' ?>>Couple</option>
                    <option value="groupe" <?= $productSelected['social_group']=='groupe' ? 'selected' : '' ?>>Groupe</option>
                </select><br>

                <label>Surface Exigé :</label>
                <input  type="number" name="area_required" id="area_required" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['area_required'] : ''; ?><?php else: ?><?= $productSelected['area_required'] ?><?php endif;?>" />m²<br>

                <label>Poids :</label>
                <input  type="number" step="0.01" name="weight" id="weight" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['weight'] : ''; ?><?php else: ?><?= $productSelected['weight'] ?><?php endif;?>" />kg<br>

                <label>Longueur :</label>
                <input  type="number" name="length" step="0.01" id="length" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['length'] : ''; ?><?php else: ?><?= $productSelected['length'] ?><?php endif;?>" />m<br>

                <label>Taille :</label>
                <input  type="number" name="height" step="0.01" id="height" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['height'] : ''; ?><?php else: ?><?= $productSelected['height'] ?><?php endif;?>" />m<br>

                <label>Prix :</label>
                <input  type="number" name="price" id="price" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : ''; ?><?php else: ?><?= $productSelected['price'] ?><?php endif;?>" />$<br>

                <label>Quantité :</label>
                <input  type="number" name="quantity" id="quantity" value="<?php if (isset($_SESSION['old_inputs'])): ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : ''; ?><?php else: ?><?= $productSelected['quantity'] ?><?php endif;?>" /><br>


                <label>Categorie :</label>
                <select name="category_id" id="category_id">
                    <?php foreach ($categories as $category): ?>
                    <option  value="<?= $category['id'] ?>" <?= $categorySelected['category_id']==$category['id'] ? 'selected' : '' ?> ><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="name">Publication :</label>
                <select name="publish" id="publish">
                    <option value="1" <?= $productSelected['publish']==1 ? 'selected' : '' ?> >Oui</option>
                    <option value="0" <?= $productSelected['publish']==0 ? 'selected' : '' ?>>Non</option>
                </select><br>

                <input type="submit" value="Enregistrer" />

            </form>

            <h2>Formulaire Image</h2>
            <form action="index.php?admin=products&action=edit&form=image&id=<?= $productSelected['id']?>" method="post" enctype="multipart/form-data">

                <select onchange="displayInputImg(this)" id="selectImage">
                    <option value="thumb">Image produit</option>
                    <option value="desc2">Image Description 1</option>
                    <option value="desc3">Image Description 2</option>
                    <option value="desc4">Image Description 3</option>
                    <option value="desc5">Image Description 4</option>
                    <option value="size">Size</option>
                    <option value="colorNull">Couleur basique</option>
                    <?php foreach ($colors as $color): ?>
                    <option value="<?= $color['url_variable'] ?>"><?= $color['name'] ?></option>
                    <?php endforeach; ?>
                </select><br>

                <div class="divHidden" id="divthumb">
                    <label>Image produit :</label>
                    <input  type="file" name="thumb" id="thumb" /><br>
                </div>

                <div class="divHidden" id="divdesc2">
                    <label>Image Description 1 :</label>
                    <input  type="file" name="desc2" id="desc2" /><br>
                </div>

                <div class="divHidden" id="divdesc3">
                    <label>Image Description 2 :</label>
                    <input  type="file" name="desc3" id="desc3" /><br>
                </div>

                <div class="divHidden" id="divdesc4">
                    <label>Image Description 3 :</label>
                    <input  type="file" name="desc4" id="desc4" /><br>
                </div>

                <div class="divHidden" id="divdesc5">
                    <label>Image Description 4 :</label>
                    <input  type="file" name="desc5" id="desc5" /><br>
                </div>

                <div class="divHidden" id="divsize">
                    <label>Echelle :</label>
                    <input  type="file" name="size" id="size" /><br>
                </div>

                <div class="divHidden" id="divColorNull">
                    <label>Couleur basique :</label>
                    <input  type="file" name="colorNull" id="colorNull" /><br>
                </div>

                <?php foreach ($colors as $color): ?>
                    <div class="divHidden" id="div<?= $color['url_variable'] ?>">
                        <label for="name"><?= $color['name'] ?> :</label> <img src="./assets/img/skin/<?= $color['img'] ?>">
                        <input  type="file" name="<?= $color['url_variable'] ?>" id="<?= $color['name'] ?>" /><br>
                    </div>
                <?php endforeach; ?>



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



