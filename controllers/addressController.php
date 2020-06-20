<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
if (empty($_SESSION['card'])){
    header('Location:index.php');
    exit;
}
if (isset($_GET['id'])){
    if ($_GET['id']==$_SESSION['id']){
        header('Location:index.php');
        exit;
    }
}
require_once 'models/Category.php';
require_once 'models/Address.php';

$categories = getCategories();
$countries = allCountries();
$allAddress = getAddressUser($_SESSION['user']['id']);

if (isset($_GET['action'])){
    if ($_GET['action'] == 'modify'){
        $_SESSION['addressModify'] = null;
        $_SESSION['confirm'] = null;
        $_SESSION['messages'] = null;
        $_SESSION['addressModify'] = null;
        if(!empty($_POST['addressSelected'])){
            $checkAddress = checkAddress($_SESSION['user']['id'],$_POST['addressSelected']);
            if ($checkAddress){
                $addressModify = getAddress($_POST['addressSelected']);
                $_SESSION['addressModify'] = $addressModify;
            }

        }
    }
    if ($_GET['action'] == 'add'){
        $_SESSION['addressModify'] = null;
        $_SESSION['confirm'] = null;
        $_SESSION['messages'] = null;
        if (empty($_POST['lastName']) || empty($_POST['firstName']) || empty($_POST['address']) || empty($_POST['zipCode']) || empty($_POST['city']) || empty($_POST['countries'])){
            if (empty($_POST['lastName'])){
                $_SESSION['messages']['add'][] = 'Le champ Nom est obligatoire !';
            }
            if (empty($_POST['firstName'])){
                $_SESSION['messages']['add'][] = 'Le champ Prenom est obligatoire !';
            }
            if (empty($_POST['address'])){
                $_SESSION['messages']['add'][] = 'Le champ Adresse est obligatoire !';
            }
            if (empty($_POST['zipCode'])){
                $_SESSION['messages']['add'][] = 'Le champ Code Postal est obligatoire !';
            }
            if (empty($_POST['city'])){
                $_SESSION['messages']['add'][] = 'Le champ Ville est obligatoire !';
            }
            if (empty($_POST['countries'])){
                $_SESSION['messages']['add'][] = 'Le champ Pays est obligatoire !';
            }
            include './views/address.php';

        }
        else{
            addAddress($_POST);
            $_SESSION['confirm'][] = 'L\'adresse a bien etait ajouté';
            header('Location:index.php?card=address');
            exit;

        }
    }
    if ($_GET['action'] == 'edit'){
        $_SESSION['confirm'] = null;
        $_SESSION['messages'] = null;
        if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['address']) || empty($_POST['zip_code']) || empty($_POST['city']) || empty($_POST['countries'])){
            if (empty($_POST['last_name'])){
                $_SESSION['messages']['modify'][] = 'Le champ Nom est obligatoire !';
            }
            if (empty($_POST['first_name'])){
                $_SESSION['messages']['modify'][] = 'Le champ Prenom est obligatoire !';
            }
            if (empty($_POST['address'])){
                $_SESSION['messages']['modify'][] = 'Le champ Adresse est obligatoire !';
            }
            if (empty($_POST['zip_code'])){
                $_SESSION['messages']['modify'][] = 'Le champ Code Postal est obligatoire !';
            }
            if (empty($_POST['city'])){
                $_SESSION['messages']['modify'][] = 'Le champ Ville est obligatoire !';
            }
            if (empty($_POST['countries'])){
                $_SESSION['messages']['modify'][] = 'Le champ Pays est obligatoire !';
            }
            include './views/address.php';

        }
        else{
            updateAddress($_POST,$_GET['address_id']);
            $_SESSION['confirm'][] = 'L\'adresse a bien etait modifier';
            $_SESSION['addressModify'] = null;
            header('Location:index.php?card=address');
            exit;

        }
    }
    if ($_GET['action'] == 'confirm'){
        $_SESSION['addressModify'] = null;
        $_SESSION['confirm'] = null;
        $_SESSION['messages'] = null;
        $addressUser = getAddressUser($_SESSION['user']['id']);
        foreach ($addressUser as $address){
            if (!empty($_POST['addressBill'])){
                if ($address['id']==$_POST['addressDelivery'] || $address['id']==$_POST['addressBill']){
                    if ($address['id']==$_POST['addressDelivery']){
                        $addressSelected['addressDelivery'][] = $address;
                    }
                    else{
                        $addressSelected['addressBill'][] = $address;
                    }
                }
            }
            else{
                if ($address['id']==$_POST['addressDelivery']){
                    $addressSelected['addressDelivery'][] = $address;
                }
                else{
                    $addressSelected['addressBill'][] = $address;
                }
            }

        }
        var_dump($_SESSION['messages']);
        if ($_SESSION['messages']==null){
            $_SESSION['deliveryInformation'] = null;
            $_SESSION['deliveryInformation'] = $addressSelected;
            header('Location:index.php?card=delivery');
            exit;
        }
    }
}

include './views/address.php';
