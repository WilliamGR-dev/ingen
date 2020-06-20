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

$categories = getCategories();

if($_GET['action'] == 'list'){
    $users = getallUser();
	require('views/userList.php');
    $_SESSION['messages'] = null;
}
elseif($_GET['action'] == 'new'){
    $users = getallUser();
	require('views/albumForm.php');
}
elseif($_GET['action'] == 'add'){

	if(empty($_POST['name']) || empty($_POST['year']) || empty($_POST['artist'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
		}
		if(empty($_POST['year'])){
			$_SESSION['messages'][] = 'Le champ date est obligatoire !';
		}
		if(empty($_POST['artist'])){
			$_SESSION['messages'][] = 'Le champ artist est obligatoire !';
		}
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?controller=albums&action=new');
		exit;
	}
	else{
		$resultAdd = addAlbum($_POST);
		
		$_SESSION['messages'][] = $resultAdd ? 'Album enregistré !' : "Erreur lors de l'enregistreent du User... :(";
		
		header('Location:index.php?controller=albums&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){

    if (!isset($_GET['id'])){
        header('Location:index.php?admin=users&action=list');
        exit;
    }
    else{
        $userExist = getInfoUser($_GET['id']);
        if (!$userExist){
            header('Location:index.php?admin=users&action=list');
            exit;
        }

    }
	
	if(!empty($_POST)){
        if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email'])){

            $is_admin_choice = false;
            $_SESSION['messages'] = null;
            if(empty($_POST['first_name'])){
                $_SESSION['messages'][] = 'Le champ prenom est obligatoire !';
            }
            if(empty($_POST['last_name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if($_POST['is_admin'] == '0' || $_POST['is_admin']== '1'){
                $is_admin_choice = true;
            }
            if(empty($_POST['email'])){
                $_SESSION['messages'][] = 'Le champ email est obligatoire !';
            }
            if ($is_admin_choice == false){
                $_SESSION['messages'][] = 'Le champ admin est obligatoire !';
            }
            $_SESSION['old_inputs'] = null;
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?admin=users&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $_SESSION['old_inputs'] = null;
            $result = updateUser($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'User mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?admin=users&action=list');
            exit;
        }
	}
	else{
		$user = getInfoUser($_GET['id']);
		require('views/userForm.php');
	}

}
elseif($_GET['action'] == 'delete'){
	$result = deletUser($_GET['id']);
	if($result){
		$_SESSION['messages'][] = 'User supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?admin=users&action=list');
	exit;
}
else{
    header('Location:index.php');
    exit;
}

