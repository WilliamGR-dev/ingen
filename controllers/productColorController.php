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
require_once 'models/Color.php';
require_once 'models/Product.php';

$categories = getCategories();

if($_GET['action'] == 'list'){
    $colors = getColors();
	require('views/colorList.php');
    $_SESSION['messages'] = null;
}
elseif($_GET['action'] == 'new'){
	require('views/colorForm.php');
}
elseif($_GET['action'] == 'add'){

	if(empty($_POST['name'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
		}
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?admin=productColor&action=new');
		exit;
	}
	else{
	    $image = $_FILES;
		$resultAdd = addColor($_POST,$_FILES);
		
		$_SESSION['messages'][] = $resultAdd ? 'Couleur enregistré !' : "Erreur lors de l'enregistreent de la couleur... :(";
		
		header('Location:index.php?admin=productColor&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){

    if (!isset($_GET['id'])){
        header('Location:index.php?admin=productColor&action=list');
        exit;
    }
    else{
        $colorExist = getColor($_GET['id']);
        if (!$colorExist){
            header('Location:index.php?admin=productColor&action=list');
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
            header('Location:index.php?admin=productColor&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $_SESSION['old_inputs'] = null;
            $result = updateColor($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Couleur mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?admin=productColor&action=list');
            exit;
        }
	}
	else{
		$colorSelected = getColor($_GET['id']);
		require('views/colorForm.php');
	}

}
elseif($_GET['action'] == 'delete'){
	$result = deletColor($_GET['id']);
	if($result){
		$_SESSION['messages'][] = 'Couleur supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?admin=productColor&action=list');
	exit;
}
else{
    header('Location:index.php');
    exit;
}

