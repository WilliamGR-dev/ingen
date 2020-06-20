<?php

function getAllProducts($categoryId = null,$order = null){

    $db = dbConnect();
    if ($categoryId == null){
        $query = $db->prepare('SELECT * FROM products');
        $query->execute();
        $allProducts = $query->fetchAll();
        return $allProducts;
    }
    else{
        $query = $db->prepare('SELECT * FROM categories_products WHERE category_id = :category_id');
        $query->execute([

            'category_id' => $categoryId

        ]);
        $productsId = $query->fetchAll();
        if ($order == null){
            $query = $db->prepare('SELECT * FROM products');
            $query->execute();
            $allProducts = $query->fetchAll();
        }
        else{
            switch ($order):
                case 'socialgroup':
                    $query = $db->prepare('SELECT * FROM products ORDER BY `products`.`social_group` ASC');
                    $query->execute();
                    $allProducts = $query->fetchAll();
                    break;
                case 'alphabetique':
                    $query = $db->prepare('SELECT * FROM products ORDER BY `products`.`name` ASC');
                    $query->execute();
                    $allProducts = $query->fetchAll();
                    break;
                case 'priceasc':
                    $query = $db->prepare('SELECT * FROM products ORDER BY `products`.`price` ASC');
                    $query->execute();
                    $allProducts = $query->fetchAll();
                    break;
                case 'pricedesc':
                    $query = $db->prepare('SELECT * FROM products ORDER BY `products`.`price` DESC');
                    $query->execute();
                    $allProducts = $query->fetchAll();
                    break;
                default:

            endswitch;
        }
        $productSelected = array();
        foreach ($allProducts as $product){
            foreach ($productsId as $productId){
                if ($product['id'] == $productId['product_id']){
                    array_push($productSelected, $product);
                }
            }
        }

        return $productSelected;
    }

}

function getProduct($productId){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM products WHERE id = :id');
    $query->execute([

        'id' => $productId

    ]);
    $productSelected = $query->fetch();

    return $productSelected;

}

function getProductByName($nameProduct){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM products WHERE name = :name');
    $query->execute([

        'name' => $nameProduct

    ]);
    $productSelected = $query->fetch();

    return $productSelected;

}

function getProductsAdmin(){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM categories_products');
    $query->execute();
    $productsCategories = $query->fetchAll();
    $query = $db->prepare('SELECT * FROM categories');
    $query->execute();
    $allCategory = $query->fetchAll();
    $allProduct = getAllProducts();

    $productAdmin = array();
    foreach ($productsCategories as $productCategorie){
        $productSelected = array();
        $productCategorie['product_id'];
        foreach ($allProduct as $product){
            if ($productCategorie['product_id']==$product['id']){
                $productSelected['id'] = $product['id'];
                $productSelected['name'] = $product['name'];
            }
        }
        foreach ($allCategory as $category){
            if ($productCategorie['category_id']== $category['id']){
                $productSelected['category'] = $category['name'];
            }
        }
        array_push($productAdmin, $productSelected);

    }

    return $productAdmin;
}

function addProduct($informations, $imgs){
    $db = dbConnect();
    $allColors = getColors();


    var_dump($informations);
    $query = $db->prepare("INSERT INTO products (name, description, diet, social_group, area_required, weight, length, height, price, quantity, publish) VALUES(:name, :description, :diet, :social_group, :area_required, :weight, :length, :height, :price, :quantity, :publish)");
    $result = $query->execute([
        'name' => ucfirst($informations['name']),
        'description' => $informations['description'],
        'diet' => $informations['diet'],
        'social_group' => $informations['social_group'],
        'area_required' => intval($informations['area_required']),
        'weight' => floatval($informations['weight']),
        'length' => floatval($informations['length']),
        'height' => floatval($informations['height']),
        'price' => intval($informations['price']),
        'quantity' => intval($informations['quantity']),
        'publish' => intval($informations['publish'])
    ]);
    $lastInsertId = $db->lastInsertId();
    mkdir('./assets/img/products/'. ucfirst($informations['name']), 0700);
    mkdir('./assets/img/products/'. ucfirst($informations['name']).'/skin', 0700);
    mkdir('./assets/img/products/'. ucfirst($informations['name']).'/photoDescription', 0700);
    mkdir('./assets/img/products/'. ucfirst($informations['name']).'/photoProduit', 0700);
    foreach ($imgs as $key=>$img){
        if ($img['name']!=''){
            if ($key=='colorNull'){
                $new_file_name = 'null.png';
                $destination = './assets/img/products/'. ucfirst($informations['name']) .'/skin/'. $new_file_name;
                $results = move_uploaded_file( $img['tmp_name'], $destination);
            }
            elseif ($key == 'desc2' || $key == 'desc3' || $key == 'desc4' || $key == 'desc5'){
                $string = substr($key, 3, -3);
                $new_file_name = $string.'.png';
                $destination = './assets/img/products/'. ucfirst($informations['name']) .'/photoDescription/'. $new_file_name;
                $results = move_uploaded_file( $img['tmp_name'], $destination);
            }
            elseif ($key=='size'){
                $new_file_name = 'size.png';
                $destination = './assets/img/products/'. ucfirst($informations['name']) .'/photoDescription/'. $new_file_name;
                $results = move_uploaded_file( $img['tmp_name'], $destination);
            }
            elseif ($key=='thumb'){
                $new_file_name = 'thumb.png';
                $destination = './assets/img/products/'. ucfirst($informations['name']) .'/photoProduit/'. $new_file_name;
                $results = move_uploaded_file( $img['tmp_name'], $destination);
            }
            else{
                foreach ($allColors as $color){
                    if ($key == $color['id']){
                        $new_file_name = $color['url_variable'].'.png';
                        $destination = './assets/img/products/'. ucfirst($informations['name']) .'/skin/'. $new_file_name;
                        $results = move_uploaded_file( $img['tmp_name'], $destination);
                        addProductColor($color['id'],$lastInsertId);
                    }
                }
            }
        }
    }
    $query = $db->prepare("INSERT INTO categories_products (category_id, product_id) VALUES(:category_id, :product_id)");
    $result = $query->execute([
        'category_id' => $informations['category_id'],
        'product_id' => $lastInsertId
    ]);

    return $result;

}

function updateProductInfo($id,$informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE products SET name = :name, description = :description, diet = :diet, social_group = :social_group, area_required = :area_required, weight = :weight, length = :length, height = :height, price = :price, quantity = :quantity, publish = :publish WHERE id = :id');
    $result = $query->execute(
        [
            'name' => ucfirst($informations['name']),
            'description' => $informations['description'],
            'diet' => $informations['diet'],
            'social_group' => $informations['social_group'],
            'area_required' => intval($informations['area_required']),
            'weight' => floatval($informations['weight']),
            'length' => floatval($informations['length']),
            'height' => floatval($informations['height']),
            'price' => intval($informations['price']),
            'quantity' => intval($informations['quantity']),
            'publish' => intval($informations['publish']),
            'id' => $id
        ]
    );
    return $result;
}

function updateProductImg($img,$id){

    $colors = getColors();
    $db = dbConnect();
    $productId = getProduct($id);
    if ($img['thumb']['name']!=''){
        $new_file_name = 'thumb.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoProduit/'. $new_file_name;
        $results = move_uploaded_file( $img['thumb']['tmp_name'], $destination);
        return $results;
    }
    if ($img['desc2']['name']!=''){
        $new_file_name = '2.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoDescription/'. $new_file_name;
        $results = move_uploaded_file( $img['desc2']['tmp_name'], $destination);
        return $results;
    }
    if ($img['desc3']['name']!=''){
        $new_file_name = '3.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoDescription/'. $new_file_name;
        $results = move_uploaded_file( $img['desc3']['tmp_name'], $destination);
        return $results;
    }
    if ($img['desc4']['name']!=''){
        $new_file_name = '4.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoDescription/'. $new_file_name;
        $results = move_uploaded_file( $img['desc4']['tmp_name'], $destination);
        return $results;
    }
    if ($img['desc5']['name']!=''){
        $new_file_name = '5.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoDescription/'. $new_file_name;
        $results = move_uploaded_file( $img['desc5']['tmp_name'], $destination);
        return $results;
    }
    if ($img['size']['name']!=''){
        $new_file_name = 'size.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoDescription/'. $new_file_name;
        $results = move_uploaded_file( $img['size']['tmp_name'], $destination);
        return $results;
    }
    if ($img['colorNull']['name']!=''){
        $new_file_name = 'Null.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/photoDescription/'. $new_file_name;
        $results = move_uploaded_file( $img['colorNull']['tmp_name'], $destination);
        return $results;
    }
    foreach ($colors as $color) {
    if ($img[$color['url_variable']]['name']!=''){
        $new_file_name = $color['url_variable'].'.png';
        $destination = './assets/img/products/'. ucfirst($productId['name']) .'/skin/'. $new_file_name;
        $results = move_uploaded_file( $img[$color['url_variable']]['tmp_name'], $destination);
        $colorExist = getProductColor($productId['id'],$color['id']);
        if (!$colorExist){
            $query = $db->prepare("INSERT INTO products_colors (color_id, product_id) VALUES(:color_id, :product_id)");
            $result = $query->execute([                        
                'color_id' => $color['id'],
                'product_id' => $productId['id']
            ]);                                                
        }
        return $results;
    }
    }
}

function updateCard($carts){

    $products = getAllProducts();

    foreach ($products as $product){
        foreach ($carts as $key => $cart){
            if ($cart['name']==$product['name']){
                $cart['price'] = $product['price'];
                $carts[$key]['price'] = $cart['price'];
            }
        }
    }
    $result = $carts;

    return $result;
}

function deleteProduct($id){
    $db = dbConnect();
    $product = getProduct($id);

    rmdir('./assets/img/products/'.$product['name']);
    $query = $db->prepare('DELETE FROM colors WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query;

    return $result;
}

function getRandProducts($limit){
    $db = dbConnect();
    $query = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");
    $Randproducts = $query->fetchAll();
    return $Randproducts;
}

function reduceQuantity($id,$quantity){
    $db = dbConnect();
    $product = getProduct($id);
    $reduceQuantity = $product['quantity']-$quantity;
    $query = $db->prepare('UPDATE products SET quantity = :quantity WHERE id = :id');
    $result = $query->execute(
        [
            'quantity' => intval($reduceQuantity),
            'id' => $id
        ]
    );
    return $result;
}

function increasQuantity($name,$quantity){
    $db = dbConnect();
    $product = getProductByName($name);
    $id = $product['id'];
    $increaseQuantity = $product['quantity']+$quantity;
    $query = $db->prepare('UPDATE products SET quantity = :quantity WHERE id = :id');
    $result = $query->execute(
        [
            'quantity' => intval($increaseQuantity),
            'id' => $id
        ]
    );
    return $result;
}


