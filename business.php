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
    $db = get_db();
    if(move_uploaded_file($photo['temp_path'], $path) && $id == null){
        $db->photos->insertOne($photo);
    } 
    elseif(move_uploaded_file($photo['temp_path'], $path) && $id != null){
        $db->photos->replaceOne(['_id' => new ObjectID($id)], $photo);
    }
    return true;
}

function get_photos(){
    $db = get_db();
    return $db->photos->find()->toArray();
}
