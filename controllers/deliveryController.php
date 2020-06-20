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

$categories = getCategories();

if ($_SESSION['deliveryInformation']==null){
    header('Location:index.php');
    exit;
}

if (isset($_GET['action'])){
    if ($_GET['action']=='add'){
        if ($_POST['number']==null){
            header('Location:index.php?card=payement');
            exit;
        }
        else{
            if (!ctype_digit($_POST['number'])){
                $_SESSION['messages'] = null;
                $_SESSION['messages'][] = 'Entrer un numero valide';
                include './views/delivery.php';
            }
            else{
                $_SESSION['deliveryPhone'] = $_POST['number'];
                header('Location:index.php?card=payement');
                exit;
            }
        }
    }
}

include './views/delivery.php';
