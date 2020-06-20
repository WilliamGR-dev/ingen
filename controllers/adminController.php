<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
if ($_SESSION['user']['is_admin']!=1){
    header('Location:index.php');
    exit;
}
require ('./models/User.php');
require_once 'models/Category.php';

$categories = getCategories();


include './views/indexAdmin.php';


