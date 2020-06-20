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
    $products = getProductsAdmin();
	require('views/productList.php');
    $_SESSION['messages'] = null;
}
elseif($_GET['action'] == 'new'){
	require('views/productForm.php');
}
elseif($_GET['action'] == 'add'){
    $_SESSION['messages'] = null;
	if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['diet']) || empty($_POST['social_group']) || empty($_FILES['desc2']) || empty($_FILES['desc3']) || empty($_FILES['desc4']) || empty($_FILES['desc5'])  || empty($_FILES['size'])  ||  empty($_FILES['colorNull']) || empty($_POST['area_required']) || empty($_POST['weight']) || empty($_POST['length']) || empty($_POST['height']) || empty($_POST['length']) || empty($_POST['price'])  || empty($_POST['quantity'])  || empty($_POST['category_id']) || empty($_POST['publish'])){
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
		}
        if(empty($_POST['description'])){
            $_SESSION['messages'][] = 'Le champ description est obligatoire !';
        }
        if(empty($_POST['diet'])){
            $_SESSION['messages'][] = 'Le champ regime alimentaire est obligatoire !';
        }
        if(empty($_POST['social_group'])){
            $_SESSION['messages'][] = 'Le champ groupe social est obligatoire !';
        }
        if(empty($_FILES['thumb'])){
            $_SESSION['messages'][] = 'L\'image du produit est obligatoire !';
        }
        if(empty($_FILES['desc2'])){
            $_SESSION['messages'][] = 'Les images description sont toutes obligatoires !';
        }
        if(empty($_FILES['desc3'])){
            $_SESSION['messages'][] = 'Les images description sont toutes obligatoires !';
        }
        if(empty($_FILES['desc4'])){
            $_SESSION['messages'][] = 'Les images description sont toutes obligatoires !';
        }
        if(empty($_FILES['desc5'])){
            $_SESSION['messages'][] = 'Les images description sont toutes obligatoires !';
        }
        if(empty($_FILES['size'])){
            $_SESSION['messages'][] = 'L\'image echelles est obligatoire !';
        }
        if(empty($_FILES['colorNull'])){
            $_SESSION['messages'][] = 'Les images description sont toutes obligatoires !';
        }
        if(empty($_POST['area_required'])){
            $_SESSION['messages'][] = 'Le champ surface requise est obligatoire !';
        }
        if(empty($_POST['weight'])){
            $_SESSION['messages'][] = 'Le champ description est obligatoire !';
        }
        if(empty($_POST['length'])){
            $_SESSION['messages'][] = 'Le champ longueur est obligatoire !';
        }
        if(empty($_POST['height'])){
            $_SESSION['messages'][] = 'Le champ hauteurs est obligatoire !';
        }
        if(empty($_POST['length'])){
            $_SESSION['messages'][] = 'Le champ longueur est obligatoire !';
        }
        if(empty($_POST['price'])){
            $_SESSION['messages'][] = 'Le champ price est obligatoire !';
        }
        if(empty($_POST['quantity'])){
            $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
        }
        if(empty($_POST['category_id'])){
            $_SESSION['messages'][] = 'Le champ categorie est obligatoire !';

        }
        if(empty($_POST['publish'])){
            $_SESSION['messages'][] = 'Le champ publication est obligatoire !';
        }
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?admin=products&action=new');
		exit;
	}
	else{
        $productExist = getProductByName($_POST['name']);
        if ($productExist){
            $_SESSION['messages'][] = 'Le nom existe deja !';
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?admin=products&action=new');
            exit;
        }
		$resultAdd = addProduct($_POST,$_FILES);
		
		$_SESSION['messages'][] = $resultAdd ? 'Produit enregistré !' : "Erreur lors de l'enregistreent de la categorie... :(";
		
		header('Location:index.php?admin=products&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){

    if (!isset($_GET['id'])){
        header('Location:index.php?admin=products&action=list');
        exit;
    }
    else{
        $userExist = getCategorie($_GET['id']);
        if (!$userExist){
            header('Location:index.php?admin=products&action=list');
            exit;
        }
    }
    if (isset($_GET['form']) ){
        var_dump($_GET['form']);
        if(!empty($_POST)){
            if ($_GET['form']=='info'){
                if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['diet']) || empty($_POST['social_group']) || empty($_POST['area_required']) || empty($_POST['weight']) || empty($_POST['length']) || empty($_POST['height']) || empty($_POST['length']) || empty($_POST['price'])  || empty($_POST['quantity'])  || empty($_POST['category_id']) || empty($_POST['publish'])){
                    $_SESSION['messages'] = null;
                    if(empty($_POST['name'])){
                        $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                    }
                    if(empty($_POST['description'])){
                        $_SESSION['messages'][] = 'Le champ description est obligatoire !';
                    }
                    if(empty($_POST['diet'])){
                        $_SESSION['messages'][] = 'Le champ regime alimentaire est obligatoire !';
                    }
                    if(empty($_POST['social_group'])){
                        $_SESSION['messages'][] = 'Le champ groupe social est obligatoire !';
                    }
                    if(empty($_POST['area_required'])){
                        $_SESSION['messages'][] = 'Le champ surface requise est obligatoire !';
                    }
                    if(empty($_POST['weight'])){
                        $_SESSION['messages'][] = 'Le champ description est obligatoire !';
                    }
                    if(empty($_POST['length'])){
                        $_SESSION['messages'][] = 'Le champ longueur est obligatoire !';
                    }
                    if(empty($_POST['height'])){
                        $_SESSION['messages'][] = 'Le champ hauteurs est obligatoire !';
                    }
                    if(empty($_POST['length'])){
                        $_SESSION['messages'][] = 'Le champ longueur est obligatoire !';
                    }
                    if(empty($_POST['price'])){
                        $_SESSION['messages'][] = 'Le champ price est obligatoire !';
                    }
                    if(empty($_POST['quantity'])){
                        $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
                    }
                    if(empty($_POST['category_id'])){
                        $_SESSION['messages'][] = 'Le champ categorie est obligatoire !';

                    }
                    if(empty($_POST['publish'])){
                        $_SESSION['messages'][] = 'Le champ publication est obligatoire !';
                    }
                    $_SESSION['old_inputs'] = null;
                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?admin=products&action=edit&id='.$_GET['id']);
                    exit;
                }
                else{
                    $_SESSION['old_inputs'] = null;
                    $result = updateProductInfo($_GET['id'], $_POST);
                    if ($result) {
                        $_SESSION['messages'][] = 'Produit mis à jour !';
                    } else {
                        $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
                    }
                    header('Location:index.php?admin=products&action=list');
                    exit;
                }
            }
        }
        elseif($_GET['form']=='image'){
            if (!empty($_FILES)){
                $_SESSION['old_inputs'] = null;
                $result = updateProductImg($_FILES,$_GET['id']);
                $_FILES = null;
            }
        }
        if ($result) {
            $_SESSION['messages'][] = 'Produit mis à jour !';
        } else {
            $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
        }
        header('Location:index.php?admin=products&action=list');
        exit;
    }


	else{
        $_SESSION['old_inputs'] = null;
        $colors = getColors();
		$productSelected = getProduct($_GET['id']);
		$categorySelected = getCategorieProduct($_GET['id']);
		require('views/productModify.php');
	}

}
elseif($_GET['action'] == 'delete'){
	$result = deleteProduct($_GET['id']);
	if($result){
		$_SESSION['messages'][] = 'Produit supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?admin=products&action=list');
	exit;
}
else{
    header('Location:index.php');
    exit;
}

