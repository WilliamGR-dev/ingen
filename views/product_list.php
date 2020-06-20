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
<main class="product">
    <input type="checkbox" id="filter">
    <section class="filter">
        <?php include './partials/filter.php';?>
    </section>
    <div class="filterHidden"></div>
    <section class="productList">
        <h1><?= $selectedCategory['name'] ?></h1>
        <label for="filter" class="filterBtn">
            <i class="fas fa-filter"><span>Filtre</span></i>
        </label>
        <div class="productClassify">
            <div>TRIER PAR :</div>
            <a class="classify <?php if(isset($_GET['order'])):if ($_GET['order']=='socialgroup'): ?><?= 'selected' ?><?php endif;endif;?>" onclick="orderProduct(this)" title="socialgroup">Groupe Social</a>
            <a class="classify <?php if(isset($_GET['order'])):if ($_GET['order']=='alphabetique'): ?><?= 'selected' ?><?php endif;endif;?>" onclick="orderProduct(this)" title="alphabetique">De A à Z</a>
            <a class="classify <?php if(isset($_GET['order'])):if ($_GET['order']=='priceasc'): ?><?= 'selected' ?><?php endif;endif;?>" onclick="orderProduct(this)" title="priceasc">Prix croissant</a>
            <a class="classify <?php if(isset($_GET['order'])):if ($_GET['order']=='pricedesc'): ?><?= 'selected' ?><?php endif;endif;?>" onclick="orderProduct(this)" title="pricedesc">Prix décroissant</a>
        </div>
        <?php if($products != null): ?>
        <?php foreach ($products as $product): ?>
        <div class="card">
            <a>
                <div class="cardName">
                    <?= $product['name'] ?>
                </div>
            </a>
            <a class="img">
                <img src="./assets/img/fond_adn.png" class="backgroundImg">
                <img src="./assets/img/products/<?= $product['name'] ?>/photoProduit/thumb.png" class="productImg" alt="<?= $product['name'] ?>">
            </a>
            <div class="bottom">
                <div class="bottomLeft">
                    <div class="price">
                        <?= number_format($product['price'], 0, ',', ' '); ?> $
                    </div>
                    <div class="diagonalPrice">

                    </div>
                </div>
                <a href="index.php?p=product&product_id=<?= $product['id']?>" style="width: 50%">
                    <div class="bottomRight">
                        aperçu
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach;?>
        <?php endif; ?>
    </section>
</main>

</body>
<footer>
    <?php include './partials/footer_assets.php';?>
    <script src="./assets/js/product_list.js"></script>
</footer>
</html>