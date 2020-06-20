<!-- inclusion du fichier _datas.php (pour les données des produits et des catégories) -->
<?php require_once 'models/Category.php'; ?>
<?php require_once 'models/Product.php'; ?>
<?php require_once 'models/Color.php'; ?>

<?php
$selectedProduct = false;
$products = getAllProducts();
$allColors = getColors();
$productsColor = getProductColors($_GET['product_id']);

if(isset($_GET['product_id']) ){

    if(!ctype_digit($_GET['product_id'])) {
        header('Location:index.php');
        exit;
    }

    $selectedProduct = getProduct($_GET['product_id']);
}


if($selectedProduct == false ){
    header('Location:index.php');
    exit;
}
else{
    if ($selectedProduct['publish'] != 1){
        header('Location:index.php');
        exit;
    }
    switch ($selectedProduct['social_group']){
        case 'solitary' :
            $selectedProduct['social_group'] = 'Solitaire';
            break;
        case 'couple' :
            $selectedProduct['social_group'] = 'Couple';
            break;
        case 'groupe' :
            $selectedProduct['social_group'] = 'Groupe';
            break;
        default:
            break;
    }

}
if (isset($_GET['option'])){

    if ($_GET['option']=='addCard'){
        if (empty($_POST['quantity']) || empty($_POST['color'])){
            if(empty($_POST['quantity'])){
                $messages[] = 'Le champ quantity est obligatoire !';
            }
            if(empty($_POST['color'])){
                $messages[] = 'Le champ couleur est obligatoire !';
            }
        }
        else{
            if ($_POST['quantity']>$selectedProduct['quantity']){
                $messages[] = 'Vous ne pouvez pas avoir une quantité superieur au stock !';
            }
            else{
                reduceQuantity($selectedProduct['id'],$_POST['quantity']);
                $item = ['quantity' => $_POST['quantity'], 'color' => $_POST['color'], 'price' => $selectedProduct['price'], 'name' => $selectedProduct['name']];
                $_SESSION['card'][] = $item;
                $cardAdd = true;
            }
        }
    }

}
$categories = getCategories();
?>

<?php include 'views/product.php'; ?>