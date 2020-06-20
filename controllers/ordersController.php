<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
require ('./models/User.php');
require ('./models/Order.php');
require_once 'models/Category.php';

$categories = getCategories();
$orders = getOrders($_SESSION['user']['id']);

include './views/orders.php';
