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

require_once 'models/Category.php';

$categories = getCategories();

if($_GET['action'] == 'list'){
	require('views/categorieList.php');
    $_SESSION['messages'] = null;
}
elseif($_GET['action'] == 'new'){
	require('views/categorieForm.php');
}
elseif($_GET['action'] == 'add'){
    $_SESSION['messages'] = null;

	if(empty($_POST['name'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
		}
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?admin=categories&action=new');
		exit;
	}
	else{
	    if (!empty($_FILES['icon']['tmp_name'])){
            $resultAdd = addCategorie($_POST,$_FILES);

            $_SESSION['messages'][] = $resultAdd ? 'Categorie enregistré !' : "Erreur lors de l'enregistreent de la categorie... :(";

            header('Location:index.php?admin=categories&action=list');
            exit;
        }
	    else{
            $_SESSION['old_inputs'] = $_POST;
            $_SESSION['messages'][] = 'Le champ image est obligatoire !';
            header('Location:index.php?admin=categories&action=new');
            exit;
        }

	}
}
elseif($_GET['action'] == 'edit'){

    if (!isset($_GET['id'])){
        header('Location:index.php?admin=categories&action=list');
        exit;
    }
    else{
        $userExist = getCategorie($_GET['id']);
        if (!$userExist){
            header('Location:index.php?admin=categories&action=list');
            exit;
        }

    }
	
	if(!empty($_POST)){
        if(empty($_POST['name'])){

            $_SESSION['messages'] = null;
            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            $_SESSION['old_inputs'] = null;
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?admin=categories&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $_SESSION['old_inputs'] = null;
            $result = updateCategorie($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Categorie mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?admin=categories&action=list');
            exit;
        }
	}
	else{
		$categorieSelected = getCategorie($_GET['id']);
		require('views/categorieForm.php');
	}

}
elseif($_GET['action'] == 'delete'){
	$result = deletCategorie($_GET['id']);
	if($result){
		$_SESSION['messages'][] = 'Categorie supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?admin=categories&action=list');
	exit;
}
else{
    header('Location:index.php');
    exit;
}

