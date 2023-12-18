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

function manage_upload($id, $photo) {
    $max_size = 1048576;
    $format = ['image/jpeg', 'image/png'];

    $db = get_db();
    if(($photo['size'] <= $max_size) && in_array($photo['type'], $format)){
        $directory = 'images/';
        $file_name = basename($photo['name']);
        $path = $directory . $file_name;
        if(move_uploaded_file($photo['temp_path'], $path) && $id == null){
            $db->photos->insertOne($photo);
            return true;
        } 
        elseif(move_uploaded_file($photo['temp_path'], $path) && $id != null){
            $db->photos->replaceOne(['_id' => new ObjectID($id)], $photo);
            return true;
        }
    }
    elseif(($photo['size'] > $max_size) && !in_array($photo['type'], $format)){
        $_SESSION['error'] = 'Zdjęcie jest za duże. Dopuszczalny rozmiar zdjęcia to 1MB. Zdjęcie musi być w formacie JPG lub PNG.';
    }
    elseif($photo['size'] > $max_size){
        $_SESSION['error'] = 'Zdjęcie jest za duże. Dopuszczalny rozmiar zdjęcia to 1MB.';
    }
    elseif(!in_array($photo['type'], $format)){
        $_SESSION['error'] = 'Zdjęcie musi być w formacie JPG lub PNG.';
    }
    return false;
}