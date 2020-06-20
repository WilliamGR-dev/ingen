<?php
if (isset($_SESSION['user'])){
    header('Location:index.php?card=address');
    exit;
}

require ('./models/User.php');
require_once 'models/Category.php';

$categories = getCategories();

header('Location:index.php?p=login');
exit;