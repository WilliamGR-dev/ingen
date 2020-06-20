<?php

function allCountries(){
    $string = file_get_contents("./partials/countries.json");
    $countries = json_decode($string, true);

    return $countries;
}

function getAddressUser($id){
    $db = dbConnect();
    $array = null;

    $query = $db->prepare('SELECT * FROM users_address WHERE user_id = :user_id');
    $query->execute([

        'user_id' => $id

    ]);
    $results = $query->fetchAll();

    foreach ($results as $result){
        $query = $db->prepare('SELECT * FROM address WHERE id = :id');
        $query->execute([

            'id' => intval($result['address_id'])

        ]);
        $array[] = $query->fetch();
    }

    return  $array;
}

function addAddress($informations){

    $db = dbConnect();

    if (empty($informations['addressPlus']) && empty($informations['society'])){
        $query = $db->prepare("INSERT INTO address (first_name, last_name, address, zip_code, city, country) VALUES( :first_name, :last_name, :address, :zip_code, :city, :country )");
        $result = $query->execute([
            'first_name' => $informations['firstName'],
            'last_name' => $informations['lastName'],
            'address' => $informations['address'],
            'zip_code' => $informations['zipCode'],
            'city' => $informations['city'],
            'country' => $informations['countries'],

        ]);
    }
    elseif (!empty($informations['addressPlus']) || !empty($informations['society'])){
        if (!empty($informations['addressPlus']) && !empty($informations['society'])){
            $query = $db->prepare("INSERT INTO address (first_name, last_name, address, address_plus, zip_code, city, country, society) VALUES( :first_name, :last_name, :address, :address_plus, :zip_code, :city, :country, :society )");
            $result = $query->execute([
                'first_name' => $informations['firstName'],
                'last_name' => $informations['lastName'],
                'address' => $informations['address'],
                'address_plus' => $informations['addressPlus'],
                'zip_code' => $informations['zipCode'],
                'city' => $informations['city'],
                'country' => $informations['countries'],
                'society' => $informations['society'],

            ]);
        }
        elseif (!empty($informations['addressPlus']) && empty($informations['society'])){
            $query = $db->prepare("INSERT INTO address (first_name, last_name, address, address_plus, zip_code, city, country) VALUES( :first_name, :last_name, :address, :address_plus, :zip_code, :city, :country)");
            $result = $query->execute([
                'first_name' => $informations['firstName'],
                'last_name' => $informations['lastName'],
                'address' => $informations['address'],
                'address_plus' => $informations['addressPlus'],
                'zip_code' => $informations['zipCode'],
                'city' => $informations['city'],
                'country' => $informations['countries'],
            ]);
        }
        elseif (empty($informations['addressPlus']) && !empty($informations['society'])){
            $query = $db->prepare("INSERT INTO address (first_name, last_name, address, zip_code, city, country, society) VALUES( :first_name, :last_name, :address, :zip_code, :city, :country, :society )");
            $result = $query->execute([
                'first_name' => $informations['firstName'],
                'last_name' => $informations['lastName'],
                'address' => $informations['address'],
                'zip_code' => $informations['zipCode'],
                'city' => $informations['city'],
                'country' => $informations['countries'],
                'society' => $informations['society'],

            ]);
        }
    }
    $query = $db->prepare("INSERT INTO users_address (user_id, address_id) VALUES( :user_id, :address_id )");
    $result = $query->execute([
        'address_id' => $id = $db->lastInsertId(),
        'user_id' => $_SESSION['user']['id'],
    ]);


    return $result;

}

function checkAddress($id_user = null, $id_address = null){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users_address WHERE user_id = :user_id AND address_id = :address_id');
    $query->execute([

        'user_id' => $id_user,
        'address_id' => $id_address

    ]);
    $result = $query->fetch();

    return $result;

}

function getAddress($id_address){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM address WHERE id = :id');
    $query->execute([

        'id' => $id_address

    ]);
    $result = $query->fetch();

    return $result;
}

function updateAddress($informations,$id_address){
    $db = dbConnect();
    $id_address = intval($id_address);

    if (empty($informations['address_plus']) && empty($informations['society'])){
        $query = $db->prepare('UPDATE address SET first_name = :first_name, last_name = :last_name, address = :address, zip_code = :zip_code, city = :city, country = :country WHERE id = :id');
        $result = $query->execute(
            [
                'first_name' => $informations['first_name'],
                'last_name' => $informations['last_name'],
                'address' => $informations['address'],
                'zip_code' => $informations['zip_code'],
                'city' => $informations['city'],
                'country' => $informations['countries'],
                'id' => $id_address
            ]
        );
    }
    elseif (!empty($informations['address_plus']) || !empty($informations['society'])){
        if (!empty($informations['address_plus']) && !empty($informations['society'])){
            $query = $db->prepare('UPDATE address SET first_name = :first_name, last_name = :last_name, address = :address, address_plus = :address_plus, zip_code = :zip_code, city = :city, country = :country, society = :society WHERE id = :id');
            $result = $query->execute(
                [
                    'first_name' => $informations['first_name'],
                    'last_name' => $informations['last_name'],
                    'address' => $informations['address'],
                    'address_plus' => $informations['address_plus'],
                    'zip_code' => $informations['zip_code'],
                    'city' => $informations['city'],
                    'country' => $informations['countries'],
                    'society' => $informations['society'],
                    'id' => $id_address
                ]
            );
        }
        elseif (!empty($informations['address_plus']) && empty($informations['society'])){
            $query = $db->prepare('UPDATE address SET first_name = :first_name, last_name = :last_name, address = :address, address_plus = :address_plus, zip_code = :zip_code, city = :city, country = :country WHERE id = :id');
            $result = $query->execute(
                [
                    'first_name' => $informations['first_name'],
                    'last_name' => $informations['last_name'],
                    'address' => $informations['address'],
                    'address_plus' => $informations['address_plus'],
                    'zip_code' => $informations['zip_code'],
                    'city' => $informations['city'],
                    'country' => $informations['countries'],
                    'id' => $id_address
                ]
            );
        }
        elseif (empty($informations['address_plus']) && !empty($informations['society'])){
            $query = $db->prepare('UPDATE address SET first_name = :first_name, last_name = :last_name, address = :address, zip_code = :zip_code, city = :city, country = :country, society = :society WHERE id = :id');
            $result = $query->execute(
                [
                    'first_name' => $informations['first_name'],
                    'last_name' => $informations['last_name'],
                    'address' => $informations['address'],
                    'zip_code' => $informations['zip_code'],
                    'city' => $informations['city'],
                    'country' => $informations['countries'],
                    'society' => $informations['society'],
                    'id' => $id_address
                ]
            );
        }
    }

    return $result;

}