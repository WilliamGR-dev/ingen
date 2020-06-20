<?php
function getColors()
{
    $db = dbConnect();
    $colors = $db->query('SELECT * FROM colors');
    $colors->execute();
    $colors = $colors->fetchAll();

    return $colors;
}

function getProductColors($productId){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM products_colors WHERE product_id = :product_id');
    $query->execute([

        'product_id' => $productId

    ]);
    $productColor = $query->fetchAll();


    return $productColor;

}

function getProductColor($productId,$colorId){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM products_colors WHERE product_id = :product_id AND color_id = :color_id ');
    $query->execute([

        'product_id' => $productId,
        'color_id' => $colorId

    ]);
    $productColor = $query->fetch();


    return $productColor;

}

function getAllProductColor(){

    $db = dbConnect();
    $productColor = $db->query('SELECT * FROM products_colors');
    $productColor->execute();
    $productColor = $productColor->fetchAll();

    return $productColor;


}

function getColor($id){
    $db = dbConnect();
    $colors = $db->prepare('SELECT * FROM colors WHERE id = :id');
    $colors->execute([
        'id' => $id
    ]);
    $colors = $colors->fetch();

    return $colors;
}

function addColor($informations,$image){
    $db = dbConnect();
    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
    $name = str_replace($search, $replace, $informations['name']);
    $search = ' ';
    $replace = '_';
    $name_url = str_replace($search, $replace, $name);
    $name_url = strtolower($name_url);
    $search = ' ';
    $replace = '';
    $nameImg = str_replace($search, $replace, $name);
    $nameImg = ucfirst($nameImg).'icon';


    $new_file_name = $nameImg . '.png';
    $destination = './assets/img/skin/' . $new_file_name;
    $query = $db->prepare("INSERT INTO colors (name, img, url_variable) VALUES(:name, :img, :url_variable)");
    $result = $query->execute([
        'name' => $informations['name'],
        'img' => $new_file_name,
        'url_variable' => $name_url
    ]);

    $results = move_uploaded_file( $image['image']['tmp_name'], $destination);

    return $result;
}

function deletColor($id){
    $db = dbConnect();

    $oldColor = getColor($id);
    $oldColor = $oldColor['img'];
    unlink('./assets/img/skin/'.$oldColor);
    $query = $db->prepare('DELETE FROM colors WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query;

    return $result;
}

function updateColor($id, $informations)
{
    $oldColor = getColor($id);
    $oldColor = $oldColor['img'];
    $db = dbConnect();
    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
    $name = str_replace($search, $replace, $informations['name']);
    $search = ' ';
    $replace = '_';
    $name_url = str_replace($search, $replace, $name);
    $name_url = strtolower($name_url);
    $search = ' ';
    $replace = '';
    $nameImg = str_replace($search, $replace, $name);
    $nameImg = ucfirst($nameImg).'icon';


    $query = $db->prepare('UPDATE colors SET name = ?, img = ?,  url_variable = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['name'],
            $nameImg.'.png',
            $name_url,
            $id
        ]
    );

    if ($_FILES['image']['name'] != ''){

        unlink('./assets/img/skin/'.$oldColor);
        $new_file_name = $nameImg . '.png';
        $destination = './assets/img/skin/' . $new_file_name;
        $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

        $db->query("UPDATE colors SET img = '$new_file_name' WHERE id = $id");
    }
    else{
        rename("assets/img/skin/$oldColor", "assets/img/skin/$nameImg.png");
    }
    return $result;
}

function addProductColor($id, $productId){
    $db = dbConnect();
    $query = $db->prepare("INSERT INTO products_colors (color_id, product_id) VALUES(:color_id, :product_id)");
    $result = $query->execute([
        'color_id' => $id,
        'product_id' => $productId
    ]);

    return $result;
}

?>