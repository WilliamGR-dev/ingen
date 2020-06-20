<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
if (empty($_SESSION['card'])){
    header('Location:index.php');
    exit;
}
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'models/Order.php';
$_SESSION['messages']  = null;

$categories = getCategories();
$_SESSION['card'] = updateCard($_SESSION['card']);

if (isset($_GET['action'])){
    if ($_GET['action']=='add'){
        if (!isset($_SESSION['deliveryInformation']['addressBill'])){
            $_SESSION['deliveryInformation']['addressBill'] = $_SESSION['deliveryInformation']['addressDelivery'];
        }
        if (!empty($_POST)){
            if (!empty($_POST['paypalPayement']) || !empty($_POST['cardPayement'])){
                if (!empty($_POST['paypalPayement'])){
                   $products['name'] = [];
                   $products['quantity'] = [];
                   $products['price'] = [];
                   $products['color'] = [];
                   foreach ($_SESSION['card'] as $product){
                       $products['name'][] = $product['name'];
                       $products['quantity'][] = $product['quantity'];
                       $products['price'][] = $product['price'];
                       $products['color'][] = $product['color'];
                   }
                   $name_Products = implode(",",$products['name']);
                   $quantity_Products = implode(",",$products['quantity']);
                   $price_Products = implode(",",$products['price']);
                   $color_Products = implode(",",$products['color']);
                   $id_user = $_SESSION['user']['id'];
                   if (isset($_SESSION['deliveryPhone'])){
                       $deliver_Phone = $_SESSION['deliveryPhone'];
                       $informations['deliver_Phone'] = $deliver_Phone;
                   }
                   else{

                       $informations['deliver_Phone'] = null;
                   }
                   $addressDelivery = $_SESSION['deliveryInformation']['addressDelivery'][0]['first_name'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['last_name'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['address'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['zip_code'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['city'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['country'];
                   $addressBill = $_SESSION['deliveryInformation']['addressBill'][0]['first_name'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['last_name'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['address'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['zip_code'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['city'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['country'];
                   $informations['name'] = $name_Products;
                   $informations['id_user'] = $id_user;
                   $informations['quantity'] = $quantity_Products;
                   $informations['price'] = $price_Products;
                   $informations['color'] = $color_Products;
                   $informations['addressDelivery'] = $addressDelivery;
                   $informations['addressBill'] = $addressBill;
                   $informations['payement'] = 'Paypal';
                   $informations['name_user'] = $_SESSION['user']['first_name'].'/'.$_SESSION['user']['last_name'];
                   addOrder($informations);
                   $_SESSION['card'] = null;
                   $_SESSION['deliveryInformation'] = null;
                   $_SESSION['deliveryPhone'] = null;
                    header('Location:index.php?card=address');
                    exit;
                }
                else{
                    $products['name'] = [];
                    $products['quantity'] = [];
                    $products['price'] = [];
                    $products['color'] = [];
                    foreach ($_SESSION['card'] as $product){
                        $products['name'][] = $product['name'];
                        $products['quantity'][] = $product['quantity'];
                        $products['price'][] = $product['price'];
                        $products['color'][] = $product['color'];
                    }
                    $name_Products = implode(",",$products['name']);
                    $quantity_Products = implode(",",$products['quantity']);
                    $price_Products = implode(",",$products['price']);
                    $color_Products = implode(",",$products['color']);
                    $id_user = $_SESSION['user']['id'];
                    if (isset($_SESSION['deliveryPhone'])){
                        $deliver_Phone = $_SESSION['deliveryPhone'];
                        $informations['deliver_Phone'] = $deliver_Phone;
                    }
                    else{

                        $informations['deliver_Phone'] = null;
                    }
                    $addressDelivery = $_SESSION['deliveryInformation']['addressDelivery'][0]['first_name'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['last_name'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['address'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['zip_code'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['city'].' '.$_SESSION['deliveryInformation']['addressDelivery'][0]['country'];
                    $addressBill = $_SESSION['deliveryInformation']['addressBill'][0]['first_name'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['last_name'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['address'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['zip_code'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['city'].' '.$_SESSION['deliveryInformation']['addressBill'][0]['country'];
                    $informations['name'] = $name_Products;
                    $informations['id_user'] = $id_user;
                    $informations['quantity'] = $quantity_Products;
                    $informations['price'] = $price_Products;
                    $informations['color'] = $color_Products;
                    $informations['addressDelivery'] = $addressDelivery;
                    $informations['addressBill'] = $addressBill;
                    $informations['payement'] = 'Carte Bancaire';
                    $informations['name_user'] = $_SESSION['user']['first_name'].'/'.$_SESSION['user']['last_name'];
                    addOrder($informations);
                    $_SESSION['card'] = null;
                    $_SESSION['deliveryInformation'] = null;
                    $_SESSION['deliveryPhone'] = null;
                    header('Location:index.php');
                    exit;
                }
            }
        }
    }
}

include './views/payement.php';