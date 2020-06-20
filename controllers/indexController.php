<?php

require_once 'models/Category.php';
require_once 'models/Product.php';
$product = getAllProducts();
$productsRand = getRandProducts(12);



include './views/index.php';
