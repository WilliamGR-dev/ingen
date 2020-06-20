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
require_once 'models/Category.php';

$categories = getCategories();


if (isset($_GET['action'])){
    $_SESSION['messages'] = null;
    if ($_GET['action'] == 'disconnect'){
        $_SESSION['user'] = null;
        header('Location:index.php');
        exit;
    }
    if ($_GET['action'] == 'edit'){
        if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || !empty($_POST['oldPassword']) || !empty($_POST['newPassword']) || !empty($_POST['newConfirmPassword'])){
            if(empty($_POST['firstName'])){
                $messages[] = 'Le champ prenom est obligatoire !';
            }
            if(empty($_POST['lastName'])){
                $messages[] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['email'])){
                $messages[] = 'Le champ email est obligatoire !';
            }
            if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['newConfirmPassword'])){
                if (hash('md5', $_POST['oldPassword']) == $_SESSION['user']['password']){
                    if ($_POST['newPassword'] != $_POST['newConfirmPassword']){
                        $messages[] = 'Les deux mots passe ne correspondent pas!';
                    }
                    else{
                        $email = $_SESSION['user']['email'];
                        editUser($_POST, $email);
                        $user = getInfoUser($_SESSION['user']['id']);
                        $_SESSION['user'] = $user;
                        $messages[] = 'Votre compte a bien été mis à jour !';
                        include './views/profil.php';
                    }
                }
                else{
                    $messages[] = 'Mauvais mot de passe!';
                }

            }
            else{
                $messages[] = 'Les champs mot de passe sont obligatoire pour changer de mot de passe !';
            }
            $user = getInfoUser($_SESSION['user']['id']);
            include './views/profil.php';
        }
        else{
            $email = $_SESSION['user']['email'];
            editUser($_POST, $email);
            $user = getInfoUser($_SESSION['user']['id']);
            $_SESSION['user'] = $user;
            $messages[] = 'Votre compte a bien été mis à jour !';
            include './views/profil.php';
            }
        }


    }
else{
    $user = getInfoUser($_SESSION['user']['id']);
    include './views/profil.php';
}
