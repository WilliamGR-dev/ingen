<?php
function getCategories()
{
    $db = dbConnect();
    $categories = $db->query('SELECT * FROM categories');

    return $categories;
}

function getCategorie($id)
{
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM categories WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query->fetch();

    return  $result;
}

function addCategorie($informations,$image){
    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
    $name = str_replace($search, $replace, $informations['name']);
    $search = ' ';
    $replace = '';
    $nameImg = str_replace($search, $replace, $name);
    $nameImg = strtolower($nameImg);
    $nameImg = substr($nameImg, 0 ,4);
    $new_file_name = $nameImg . '.png';
    $destination = './assets/img/' . $new_file_name;

    $results = move_uploaded_file( $image['icon']['tmp_name'], $destination);
    var_dump($results);
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO categories (name, img) VALUES(:name, :img)");
    $result = $query->execute([
        'name' => $informations['name'],
        'img' => $new_file_name

    ]);


    return $result;
}

function deletCategorie($id){
    $db = dbConnect();
    $oldCategorie = getCategorie($id);
    $oldCategorie = $oldCategorie['img'];
    unlink('./assets/img/skin/'.$oldCategorie);
    $query = $db->prepare('DELETE FROM categories WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query;

    return $result;
}

function updateCategorie($id,$informations){
    $oldCategorie = getCategorie($id);
    $oldCategorie = $oldCategorie['img'];
    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
    $name = str_replace($search, $replace, $informations['name']);
    $search = ' ';
    $replace = '';
    $nameImg = str_replace($search, $replace, $name);
    $nameImg = strtolower($nameImg);
    $nameImg = substr($nameImg, 0 ,4);
    $new_file_name = $nameImg . '.png';
    $destination = './assets/img/' . $new_file_name;
    $db = dbConnect();

    $query = $db->prepare('UPDATE categories SET name = :name, img = :img WHERE id = :id');
    $result = $query->execute(
        [
            'name' => $informations['name'],
            'img' => $new_file_name,
            'id' => $id
        ]
    );

    if ($_FILES['icon']['name'] != ''){

        unlink('./assets/img/'.$oldCategorie);
        $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

        $db->query("UPDATE categories SET img = '$new_file_name' WHERE id = $id");
    }
    else{
        rename("assets/img/$oldCategorie", "assets/img/$new_file_name");
    }

    return $result;
}

function getCategorieProduct($id)
{
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM categories_products WHERE product_id = :product_id');
    $query->execute([

        'product_id' => $id

    ]);
    $result = $query->fetch();

    return  $result;
}