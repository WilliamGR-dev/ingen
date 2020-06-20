<?php
$_SESSION['card'] = array();
session_start();
require ('helpers.php');
if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'product_list' :
            require 'controllers/productListController.php';
            break;

        case 'product' :
            require 'controllers/productController.php';
            break;

        case 'login' :
            require 'controllers/loginRegisterController.php';
            break;

        case 'register' :
            require 'controllers/loginRegisterController.php';
            break;

        case 'card' :
            require 'controllers/cardController.php';
            break;

        case 'profil' :
            require 'controllers/profilController.php';
            break;

        case 'profilAddress' :
            require 'controllers/profilAddressController.php';
            break;

        case 'orders' :
            require 'controllers/ordersController.php';
            break;

        case 'admin' :
            require 'controllers/adminController.php';
            break;

        case 'password' :
            require 'controllers/passwordController.php';
            break;

        case 'contact' :
            require 'controllers/contactController.php';
            break;

        case 'cgv' :
            require 'controllers/cgvController.php';
            break;

        case 'info' :
            require 'controllers/infoController.php';
            break;

        default :
            require 'controllers/indexController.php';
    endswitch;
    elseif(isset($_GET['admin'])):
    switch ($_GET['admin']):

        case 'users' :
            require 'controllers/userController.php';
            break;

        case 'categories' :
            require 'controllers/categoriesController.php';
            break;

        case 'products' :
            require 'controllers/productsController.php';
            break;

        case 'productColor' :
            require 'controllers/productColorController.php';
            break;

        case 'orders' :
            require 'controllers/ordersAdminController.php';
            break;



        default :
            require 'controllers/adminController.php';
    endswitch;

        elseif(isset($_GET['card'])):
    switch ($_GET['card']):
        case 'login' :
            require 'controllers/cardLoginRegisterController.php';
            break;
        case 'address' :
            require 'controllers/addressController.php';
            break;
        case 'delivery' :
            require 'controllers/deliveryController.php';
            break;
        case 'payement' :
            require 'controllers/payementController.php';
            break;
        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;