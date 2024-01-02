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
        $bool = true;
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        $bool = false;
    }
    return $bool;
}

function get_photos(){
    try {
        $db = get_db();
        $array = $db->photos->find()->toArray();
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        $array = [];
    }
    return $array;
}

function slice_photos($skip, $limit){
    try {
        $db = get_db();
        $filter = [
            'skip' => $skip,
            'limit' => $limit,
        ];
        $array = $db->photos->find([], $filter)->toArray();
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        $array = [];
    }
    return $array;
}

function save_user($user){
    try {
        $db = get_db();
        $db->users->insertOne($user);
        $bool = true;
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        $bool = false;
    }
    return $bool;
}

function get_user($user){
    try {
        $db = get_db();
        $found = $db->users->findOne(['login' => $user['login']]);
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        $found = [];
    }
    return $found;
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
    $found = $db->users->findOne($query);
    }
    catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("MongoDB exception: " . $e->getMessage());
        echo "Wystąpił problem. Spróbuj ponownie.";
        $found = [];
    }
    return $found;
}