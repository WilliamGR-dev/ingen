<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
else{
    if ($_SESSION['user']['is_admin']==0){
        header('Location:index.php');
        exit;
    }
}
if (!isset($_GET['action'])){
    header('Location:index.php?p=admin');
    exit;
}

require('models/User.php');
require_once 'models/Category.php';
require_once 'models/Order.php';

$categories = getCategories();


if($_GET['action'] == 'list'){
    $orders = getAllOrders();
	require('views/orderList.php');
    $_SESSION['messages'] = null;
}
elseif($_GET['action'] == 'infos'){
    $order = getOrder($_GET['id']);
    $user = getInfoUser($order['user_id']);
    $product['name'] = explode(',',$order['product']);
    $product['quantity'] = explode(',',$order['quantity']);
    $product['price'] = explode(',',$order['price']);
	require('views/orderInfos.php');
}
else{
    header('Location:index.php');
    exit;
}

