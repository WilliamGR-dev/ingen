<?php

function login($informations){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users WHERE email = ? AND  password = ?");
    $query->execute([
        $informations['email'],
        hash('md5', $informations['password'])
    ]);

    $result = $query->fetch();

    return $result;
}

function userExist($informations){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([
        $informations['email']
    ]);

    $result = $query->fetch();

    return $result;

}

function getallUser(){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users");
    $query->execute();

    $result = $query->fetchAll();

    return $result;

}

function addUser($informations){
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO users (first_name, last_name, email, password, phone_number) VALUES( :first_name, :last_name, :email, :password, :phone_number )");
    $result = $query->execute([
        'first_name' => $informations['firstName'],
        'last_name' => $informations['lastName'],
        'email' => $informations['email'],
        'password' => hash('md5', $informations['password']),
        'phone_number' => intval($informations['phoneNumber']),

    ]);

    return $result;


}

function editUser($informations, $email){
    if (empty($informations['newPassword']) && empty($informations['oldPassword']) && empty($informations['newConfirmPassword']) && empty($informations['phoneNumber'])){
        $db = dbConnect();

        $query = $db->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE email = :old_email');
        $result = $query->execute(
            [
                'first_name' => $informations['firstName'],
                'last_name' => $informations['lastName'],
                'email' => $informations['email'],
                'old_email' => $email
            ]
        );
    }
    elseif (!empty($informations['phoneNumber'])){
        if (!empty($informations['newPassword']) && !empty($informations['oldPassword']) && !empty($informations['newConfirmPassword'])){

            $db = dbConnect();

            $query = $db->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phoneNumber, password = :password WHERE email = :old_email');
            $result = $query->execute(
                [

                    'first_name' => $informations['firstName'],
                    'last_name' => $informations['lastName'],
                    'email' => $informations['email'],
                    'phoneNumber' => $informations['phoneNumber'],
                    'password' => hash('md5', $informations['newPassword']),
                    'old_email' => $email
                ]
            );

        }
        else{
            $db = dbConnect();

            $query = $db->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number WHERE email = :old_email');
            $result = $query->execute(
                [
                    'first_name' => $informations['firstName'],
                    'last_name' => $informations['lastName'],
                    'email' => $informations['email'],
                    'phone_number' => $informations['phoneNumber'],
                    'old_email' => $email
                ]
            );
        }
    }
    elseif (empty($informations['phoneNumber'])){
        if (!empty($informations['newPassword']) && !empty($informations['oldPassword']) && !empty($informations['newConfirmPassword'])){

            $db = dbConnect();

            $query = $db->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, password = :password WHERE email = :old_email');
            $result = $query->execute(
                [

                    'first_name' => $informations['firstName'],
                    'last_name' => $informations['lastName'],
                    'email' => $informations['email'],
                    'password' => hash('md5', $informations['newPassword']),
                    'old_email' => $email
                ]
            );

        }
        else{
            $db = dbConnect();

            $query = $db->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE email = :old_email');
            $result = $query->execute(
                [
                    'first_name' => $informations['firstName'],
                    'last_name' => $informations['lastName'],
                    'email' => $informations['email'],
                    'old_email' => $email
                ]
            );
        }
    }
    return $result;
}

function getInfoUser($id){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query->fetch();

    return $result;
}

function deletUser($id){
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM users WHERE id = :id');
    $query->execute([

        'id' => $id

    ]);
    $result = $query;

    return $result;
}

function updateUser($id,$informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, is_admin = :is_admin WHERE id = :id');
    $result = $query->execute(
        [
            'first_name' => $informations['first_name'],
            'last_name' => $informations['last_name'],
            'email' => $informations['email'],
            'is_admin' => $informations['is_admin'],
            'id' => $id
        ]
    );

    return $result;
}

function insertCode($code,$informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE users SET forgot_password = :forgot_password WHERE email = :email');
    $result = $query->execute(
        [
            'forgot_password' => $code,
            'email' => $informations['email']
        ]
    );

    return $result;
}

function updatePassword($email,$informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE users SET password = :password WHERE email = :email');
    $result = $query->execute(
        [
            'password' => hash('md5', $informations['password']),
            'email' => $email
        ]
    );

    return $result;
}