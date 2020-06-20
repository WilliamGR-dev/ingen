<?php require_once 'models/Category.php'; ?>
<?php require_once 'models/Product.php'; ?>
<?php require_once 'models/Color.php'; ?>

<?php

$selectedCategory = false;

$categories = getCategories();


if(isset($_GET['category_id'])){

    if(!ctype_digit($_GET['category_id'])) {
        header('Location:index.php');
        exit;
    }

    foreach($categories as $category){
        if($category['id'] == (int)$_GET['category_id'] ){
            $selectedCategory = $category;
        }
    }

    if($selectedCategory == false){
        header('Location:index.php');
        exit;
    }
}
$products = null;
$colors = getColors();
if (isset($_GET['order'])){
    $products = getAllProducts($selectedCategory['id'],$_GET['order']);
}
else{
    $products = getAllProducts($selectedCategory['id']);
}


foreach ($products as $product){
    if ($product['publish'] == 1){
        $publishProduct[] = $product;
    }
}
$product = $publishProduct;

if (isset($_GET['solitaire']) || isset($_GET['couple']) || isset($_GET['groupe'])){
    $newProducts = null;
    foreach ($products as $product){
        if (isset($_GET['solitaire'])){
            if ($product['social_group'] == 'solitary'){
                $newProducts[] = $product;
            }
        }
        if (isset($_GET['couple'])){
            if ($product['social_group'] == 'couple'){
                $newProducts[] = $product;
            }
        }
        if (isset($_GET['groupe'])){
            if ($product['social_group'] == 'groupe'){
                $newProducts[] = $product;
            }
        }
    }
    if (isset($newProducts)){
        $products = null;
        $products = $newProducts;
    }
    else{
        $products = null;
    }
}


if (isset($_GET['alpine']) || isset($_GET['aride']) || isset($_GET['cotier']) || isset($_GET['jungle']) || isset($_GET['foret_tropical']) || isset($_GET['savane'])  || isset($_GET['steppe'])){
    $newProducts = null;
    $allProductColor = getAllProductColor();
    foreach ($allProductColor as $productColor){
        if (isset($_GET['alpine'])){
            if ($productColor['color_id'] == 1){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['aride'])){
            if ($productColor['color_id'] == 2){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['cotier'])){
            if ($productColor['color_id'] == 3){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['jungle'])){
            if ($productColor['color_id'] == 4){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['foret_tropical'])){
            if ($productColor['color_id'] == 5){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['savane'])){
            if ($productColor['color_id'] == 6){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['steppe'])){
            if ($productColor['color_id'] == 7){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['taiga'])){
            if ($productColor['color_id'] == 8){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['tundra'])){
            if ($productColor['color_id'] == 9){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['vivid'])){
            if ($productColor['color_id'] == 10){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['terre_humide'])){
            if ($productColor['color_id'] == 11){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
        if (isset($_GET['terrain_boise'])){
            if ($productColor['color_id'] == 12){
                if (isset($selectedProductsColor)){
                    if (!empty($selectedProductsColor)){
                        foreach ($selectedProductsColor as $selectedProductColor){
                            if ($selectedProductColor['product_id'] == $productColor['product_id']){

                            }
                            else{
                                $selectedProductsColor[] = $productColor;
                                break;
                            }
                        }
                    }
                }
                else{
                    $selectedProductsColor[] = $productColor;
                }
            }
        }
    }
    if (isset($selectedProductsColor)){
        foreach ($products as $product){
            foreach ($selectedProductsColor as $selectedProductColor){
                if ($selectedProductColor['product_id']==$product['id']){
                    $newProducts[] = $product;
                }
            }
        }

    }
    if (isset($newProducts)){
        $products = null;
        $products = $newProducts;
    }
    else{
        $products = null;
    }

}

if (isset($_GET['pmin']) && isset($_GET['pmax'])){
    $newProducts = null;
    if (ctype_digit($_GET['pmin']) && ctype_digit($_GET['pmax'])){
        foreach ($products as $product){
            if ($product['price']>$_GET['pmin'] && $product['price']<$_GET['pmax']){
                $newProducts[] = $product;
            }
        }
        $products = $newProducts;
    }
}

if (isset($_GET['areamin']) && isset($_GET['areamax'])){
    $newProducts = null;
    if (ctype_digit($_GET['areamin']) && ctype_digit($_GET['areamax'])){
        foreach ($products as $product){
            if ($product['area_required']>$_GET['areamin'] && $product['area_required']<$_GET['areamax']){
                $newProducts[] = $product;
            }
        }
        $products = $newProducts;
    }
}

?>

<?php include 'views/product_list.php'; ?>