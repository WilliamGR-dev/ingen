<?php
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'models/Color.php';

$selectedCategory = false;
if ($_SESSION['card'] != null){
    $_SESSION['card'] = updateCard($_SESSION['card']);
}

if (isset($_GET['action'])){
    if ($_GET['action'] == 'delete'){
        if (isset($_GET['product_id'])){
            if (ctype_digit($_GET['product_id'])){
                if ($_SESSION['card']!=null){
                    if ($_GET['product_id'] <= count($_SESSION['card']) && $_GET['product_id'] >= 0){
                        $changeQuantity = increasQuantity($_SESSION['card'][intval($_GET['product_id'])]['name'],$_SESSION['card'][intval($_GET['product_id'])]['quantity']);
                        unset($_SESSION['card'][intval($_GET['product_id'])]);
                        foreach ($_SESSION['card'] as $value){
                            $newArray[] = $value;
                        }
                        $_SESSION['card'] = null;
                        if (isset($newArray)){
                            $_SESSION['card'] = $newArray;
                        }

                    }
                }
            }
        }
    }
    if ($_GET['action'] == 'confirm'){
        if ($_SESSION['card'] != null){
            $i = 0;
            foreach ($_SESSION['card'] as $product){
                if (isset($_POST['quantity'.$i])){
                    $newQuantity = increasQuantity($product['name'],$_SESSION['card'][$i]['quantity']);
                    $selectedProduct = getProductByName($product['name']);
                    if ($selectedProduct['quantity']>$_POST['quantity'.$i] && (($selectedProduct['quantity']-$_POST['quantity'.$i]>0))){
                        reduceQuantity($selectedProduct['id'],$_POST['quantity'.$i]);
                        $_SESSION['card'][$i]['quantity'] = $_POST['quantity'.$i];
                    }
                    else{
                        reduceQuantity($selectedProduct['id'],$selectedProduct['quantity']);
                        $_SESSION['card'][$i]['quantity'] = $selectedProduct['quantity'];
                    }

                }
                else{
                    $newQuantity = increasQuantity($product['name'],$_SESSION['card'][$i]['quantity']);
                    $selectedProduct = getProductByName($product['name']);
                    if ($selectedProduct['quantity']>1 && (($selectedProduct['quantity']-1)>0)){
                        reduceQuantity($selectedProduct['id'],1);
                        $_SESSION['card'][$i]['quantity'] = 1;
                    }
                    else{
                        reduceQuantity($selectedProduct['id'],$selectedProduct['quantity']);
                        $_SESSION['card'][$i]['quantity'] = $selectedProduct['quantity'];
                    }
                }
                $i++;
            }
            header('Location:index.php?card=login');
            exit;
        }
    }
}
$totalCard = 0;
$categories = getCategories();

include './views/card.php';