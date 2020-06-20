<?php

require ('./models/User.php');
require_once 'models/Category.php';

$categories = getCategories();

if (isset($_GET['action'])){
    $_SESSION['messages'] = null;
    switch ($_GET['action']):
        case 'add':
            if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])){
                if(empty($_POST['firstName'])){
                    $_SESSION['messages'][] = 'Le champ prenom est obligatoire !';
                }
                if(empty($_POST['lastName'])){
                    $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                }
                if(empty($_POST['email'])){
                    $_SESSION['messages'][] = 'Le champ email est obligatoire !';
                }
                if(empty($_POST['password'])){
                    $_SESSION['messages'][] = 'Le champ mot de passe est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;

                header('Location:index.php?p=register');
                exit;

            }
            else{
                if (!userExist($_POST)){
                    addUser($_POST);
                    $_SESSION['messages'][] = 'Votre compte a bien était crée !';
                    header('Location:index.php?p=login');
                    exit;
                }
                else{
                    $_SESSION['messages'][] = 'Le compte existe deja !';
                    header('Location:index.php?p=register');
                    exit;
                }
            }
            break;
        case 'login':
            if (empty($_POST['email']) || empty($_POST['password'])){
                if(empty($_POST['email'])){
                    $_SESSION['messages'][] = 'Le champ email est obligatoire !';
                }
                if(empty($_POST['password'])){
                    $_SESSION['messages'][] = 'Le champ mot de passe est obligatoire !';
                }
                include './views/loginRegister.php';
            }
            else{
                $user = login($_POST);
                if ($user){
                    $_SESSION['user'] = $user;
                    if ($user['is_admin']==1){
                        header('Location:index.php?p=admin');
                        exit;
                    }
                    header('Location:index.php');
                    exit;
                }
                else{
                    $_SESSION['messages'][] = 'Mauvais mot de passe ou email';
                    header('Location:index.php?p=login');
                    exit;
                }
            }
            break;
        default:
            include './views/index.php?p=login';
            break;

    endswitch;
}
else{
    include './views/loginRegister.php';
}


