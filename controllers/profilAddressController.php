<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
if (isset($_GET['id'])){
    if ($_GET['id']==$_SESSION['id']){
        header('Location:index.php');
        exit;
    }
}
require ('./models/User.php');
require ('./models/Address.php');
require_once 'models/Category.php';
$_SESSION['messages']  = null;

$categories = getCategories();
$countries = allCountries();
$allAddress = getAddressUser($_SESSION['user']['id']);

if (isset($_GET['action'])){
    $_SESSION['messages'] = null;
    if ($_GET['action'] == 'disconnect'){
        $_SESSION['user'] = null;
        header('Location:index.php');
        exit;
    }
    if ($_GET['action'] == 'modify'){
        if(!empty($_POST['addressSelected'])){
            $checkAddress = checkAddress($_SESSION['user']['id'],$_POST['addressSelected']);
            if ($checkAddress){
                $addressModify = getAddress($_POST['addressSelected']);
                include './views/profilAddress.php';
            }

        }
    }
    if ($_GET['action'] == 'add'){
        $_SESSION['messages'] = null;
        if (empty($_POST['lastName']) || empty($_POST['firstName']) || empty($_POST['address']) || empty($_POST['zipCode']) || empty($_POST['city']) || empty($_POST['countries'])){
            if (empty($_POST['lastName'])){
                $_SESSION['messages'][] = 'Le champ Nom est obligatoire !';
            }
            if (empty($_POST['firstName'])){
                $_SESSION['messages'][] = 'Le champ Prenom est obligatoire !';
            }
            if (empty($_POST['address'])){
                $_SESSION['messages'][] = 'Le champ Adresse est obligatoire !';
            }
            if (empty($_POST['zipCode'])){
                $_SESSION['messages'][] = 'Le champ Code Postal est obligatoire !';
            }
            if (empty($_POST['city'])){
                $_SESSION['messages'][] = 'Le champ Ville est obligatoire !';
            }
            if (empty($_POST['countries'])){
                $_SESSION['messages'][] = 'Le champ Pays est obligatoire !';
            }
            include './views/profilAddress.php';

        }
        else{
            addAddress($_POST);
            header('Location:index.php?p=profilAddress');
            exit;

        }
    }
    if ($_GET['action'] == 'edit'){
        $_SESSION['messages'] = null;
        if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['address']) || empty($_POST['zip_code']) || empty($_POST['city']) || empty($_POST['countries'])){
            if (empty($_POST['last_name'])){
                $_SESSION['messages'][] = 'Le champ Nom est obligatoire !';
            }
            if (empty($_POST['first_name'])){
                $_SESSION['messages'][] = 'Le champ Prenom est obligatoire !';
            }
            if (empty($_POST['address'])){
                $_SESSION['messages'][] = 'Le champ Adresse est obligatoire !';
            }
            if (empty($_POST['zip_code'])){
                $_SESSION['messages'][] = 'Le champ Code Postal est obligatoire !';
            }
            if (empty($_POST['city'])){
                $_SESSION['messages'][] = 'Le champ Ville est obligatoire !';
            }
            if (empty($_POST['countries'])){
                $_SESSION['messages'][] = 'Le champ Pays est obligatoire !';
            }
            $addressModify = getAddress($_POST['addressSelected']);
            header('Location:index.php?p=profilAddress&edit');
            exit;

        }
        else{
            $addressUserExist = checkAddress($_SESSION['user']['id'],$_GET['address_id']);
            if (!$addressUserExist){
                $_SESSION['messages'][] = 'Pas bien de toucher au formulaire';
                header('Location:index.php?p=profilAddress');
                exit;
            }
            updateAddress($_POST,$_GET['address_id']);
            $_SESSION['messages'][] = 'L\'adresse a bien etait modifier';
            header('Location:index.php?p=profilAddress');
            exit;

        }
    }

    }
else{
    $user = getInfoUser($_SESSION['user']['id']);
    include './views/profilAddress.php';
}
