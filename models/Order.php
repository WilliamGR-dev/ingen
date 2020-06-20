<?php

function getAllOrders(){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM orders ');
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function addOrder($informations){
    $db = dbConnect();

    if (empty($informations['deliver_Phone'])){
        $informations['deliver_Phone'] = "";

    }
    $query = $db->prepare("INSERT INTO orders (product, user_id, quantity, price, color, addressDelivery, addressBill, deliver_Phone, payement, name_user) VALUES( :product, :user_id, :quantity, :price, :color, :addressDelivery, :addressBill, :deliver_Phone, :payement, :name_user)");
    $result = $query->execute([
        'product' => $informations['name'],
        'user_id' => intval($informations['id_user']),
        'quantity' => $informations['quantity'],
        'price' => $informations['price'],
        'color' => $informations['color'],
        'addressDelivery' => $informations['addressDelivery'],
        'addressBill' => $informations['addressBill'],
        'deliver_Phone' => $informations['deliver_Phone'],
        'payement' => $informations['payement'],
        'name_user' => $informations['name_user']
    ]);

    return $result;
}

function getOrders($id_user){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM orders WHERE user_id = :user_id');
    $query->execute([

        'user_id' => $id_user

    ]);
    $result = $query->fetchAll();

    return $result;

}

function getOrder($id){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM orders WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query->fetch();

    return $result;

}

