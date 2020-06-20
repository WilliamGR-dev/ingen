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
<div class="productView">
    <div class="productImages">
        <div class="allImagesSelector">
            <div class="imageSelector"><img onclick="changeImage(this)" src="./assets/img/products/<?= $selectedProduct['name'] ?>/photoProduit/thumb.png" alt="<?= $selectedProduct['name'] ?>"></div>
            <div class="imageSelector"><img onclick="changeImage(this)" src="./assets/img/products/<?= $selectedProduct['name'] ?>/photoDescription/2.png" alt="<?= $selectedProduct['name'] ?>"></div>
            <div class="imageSelector"><img onclick="changeImage(this)" src="./assets/img/products/<?= $selectedProduct['name'] ?>/photoDescription/3.png" alt="<?= $selectedProduct['name'] ?>"></div>
            <div class="imageSelector"><img onclick="changeImage(this)" src="./assets/img/products/<?= $selectedProduct['name'] ?>/photoDescription/4.png" alt="<?= $selectedProduct['name'] ?>"></div>
            <div class="imageSelector"><img onclick="changeImage(this)" src="./assets/img/products/<?= $selectedProduct['name'] ?>/photoDescription/5.png" alt="<?= $selectedProduct['name'] ?>"></div>
        </div>
        <div  class="imageSelected"><img id="imageSelected" src="./assets/img/products/<?= $selectedProduct['name'] ?>/photoProduit/thumb.png" alt="<?= $selectedProduct['name'] ?>"></div>
    </div>
    <div class="productInfos">
        <div>
            <form action="index.php?p=product&product_id=<?= $selectedProduct['id'] ?>&option=addCard" method="post">
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><br>
                    <span>5 sur 5 / Lire les 12 avis</span>
                </div>
                <div class="name">
                <span id="productName">
                    <?= $selectedProduct['name'] ?>
                </span>
                </div>
                <div class="productPrice"><?= number_format($selectedProduct['price'], 0, ',', ' '); ?> $<small>ht</small></div>
                <div class="productText">
                <span>Parmi les plus grands dinosaures théropodes de tous les temps, le Tyrannosaurus rex est une espèce de dinosaure tyrannosaure de la fin du Crétacé. Il vivait dans
                    <span id="textHidden" class="textHidden">tout l'ouest de l'Amérique du Nord à la fin du Crétacé aux côtés d'autres dinosaures tels que les cératopsiens Triceratops et Torosaurus, l'hadrosaur Edmontosaurus, l'Ankylosaure blindé, les pachycéphalosaures Pachycephalosaurus, Stygimoloch et Dracorex, le plus petit théropode Troodon, et l'ornithomimide Struthiomimus, ce qui en fait l'une des dernières espèces de dinosaures non aviaires à avoir évolué avant la grande extinction il y a 66 millions d'années. Le génome de base du Tyrannosaure est principalement brun foncé, bien que d'autres variantes soient connues.</span>
                </span><a id="showAllText" onclick="extendText();" class="showAllText">[…] Lire la suite</a></div>
                <div class="colorSelect">
                    <span>Choisissez une Couleur</span><br>
                    <div class="selector">
                        <select name="color" id="color" onchange="changeImageColor(this)">
                            <option selected disabled>Faites votre choix</option>
                            <option value="null" title="null">Naturelle</option>
                            <?php foreach ($productsColor as $productColor): ?>
                                <?php foreach ($allColors as $color): ?>
                                    <?php if ($productColor['color_id']==$color['id']): ?>
                                        <option value="<?= $color['name'] ?>" title="<?= $color['url_variable'] ?>"><?= $color['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="productConfirm">
                    <div class="number-input">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                        <input onchange="checkQuantity(this)" class="quantity" min="1" name="quantity" value="1" type="number">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                    </div>
                    <div><?= $selectedProduct['quantity'] ?> en stock</div>
                    <button id="addProduct" class="addProduct">Ajouter au panier</button>
                    <dialog id="infoAddProduct" class="infoAddProduct">
                        <div class="infoCardConfirm">
                            <h1>Dino ajouté au panier</h1>
                            <i class="far fa-check-circle"></i>
                            <div class="buttonsDialog"><a href="index.php?p=card"><button type="button" class="buttonDialog">Voir le panier</button></a><a><button class="buttonDialog" onclick="infoAddProduct.close()">Continuer les achats</button></a></div>
                        </div>
                    </dialog>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="productDescription">
    <div class="productCharacteristics">
        <h2><?= $selectedProduct['name'] ?></h2>
        <div class="name">
                <span>
                    Déscription
                </span>
        </div>
        <div class="productAllInfo">
            <div class="productAllCharacteristics">
                <div> Régime alimentaire : <span><?= $selectedProduct['diet'] ?></span></div>
                <div>Groupe social : <span><?= $selectedProduct['social_group'] ?></span></div>
                <div>Surface Exigé : <span><?= number_format($selectedProduct['area_required'], 0, ',', ' '); ?>m²</span></div>
                <div>Poids : <span><?= $selectedProduct['weight'] ?> kg</span></div>
                <div>Longueur : <span><?= $selectedProduct['length'] ?> mètres</span></div>
                <div>Taille : <span><?= $selectedProduct['height'] ?> mètres</span></div>

            </div>
            <div class="productScale">
                <img src="./assets/img/products/<?= $selectedProduct['name'] ?>/PhotoDescription/size.png" alt="ScaleProduct">
            </div>
        </div>
    </div>
    <div class="productReviews">
        <div class="selectReviewsQuestions">
            <a><div class="optionReviews">Notes & Avis</div></a>
        </div>
        <div class="reviewAndStars">
            <div class="productStars">
                <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> 5</div>
                <span>12 AVIS</span>
            </div>
            <div class="productAllReviews" id="style-2">
                <div>
                    <div class="review">
                        <div class="starsReview"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="timeReview">il y a 3 mois</div>
                        <div class="messageReview">Produit conforme, rien à dire.</div>
                        <div class="nameReview">MICHEL Duponcheel - commande vérifiée</div>
                    </div>
                    <div class="review">
                        <div class="starsReview"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="timeReview">il y a 3 mois</div>
                        <div class="messageReview">Produit conforme, rien à dire.</div>
                        <div class="nameReview">MICHEL Duponcheel - commande vérifiée</div>
                    </div>
                    <div class="review">
                        <div class="starsReview"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="timeReview">il y a 3 mois</div>
                        <div class="messageReview">Produit conforme, rien à dire.</div>
                        <div class="nameReview">MICHEL Duponcheel - commande vérifiée</div>
                    </div>
                    <div class="review">
                        <div class="starsReview"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="timeReview">il y a 3 mois</div>
                        <div class="messageReview">Produit conforme, rien à dire.</div>
                        <div class="nameReview">MICHEL Duponcheel - commande vérifiée</div>
                    </div>
                    <div class="review">
                        <div class="starsReview"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="timeReview">il y a 3 mois</div>
                        <div class="messageReview">Produit conforme, rien à dire.</div>
                        <div class="nameReview">MICHEL Duponcheel - commande vérifiée</div>
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
    <script src="./assets/js/product.js"></script>
    <?php if (isset($cardAdd)): ?>
        <?= '<script>addProduct();</script>'  ?>
    <?php endif; ?>
</footer>
</html>