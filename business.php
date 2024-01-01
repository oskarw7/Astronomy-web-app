<?php
use MongoDB\BSON\ObjectID;

function get_db() {
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function save_photo($id, $photo, $path){
    try {
        $db = get_db();
        if(move_uploaded_file($photo['temp_path'], $path) && $id == null){
            $db->photos->insertOne($photo);
        } 
        elseif(move_uploaded_file($photo['temp_path'], $path) && $id != null){
            $db->photos->replaceOne(['_id' => new ObjectID($id)], $photo);
        }
        return true;
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        return false;
    }
}

function get_photos(){
    try {
        $db = get_db();
        return $db->photos->find()->toArray();
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        return false;
    }
}

function save_user($user){
    try {
        $db = get_db();
        $db->users->insertOne($user);
        return true;
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        return false;
    }
}

function get_user($user){
    try {
        $db = get_db();
        return $db->users->findOne(['login' => $user['login']]);
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        return false;
    }
}

function find_user($user){
    try {
    $db = get_db();
    $query = [
        '$or' => [
            ['login' => $user['login']],
            ['email' => $user['email']],
        ]
    ];
    return $db->users->findOne($query);
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        return false;
    }
}