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

function get_photos(){
    $db = get_db();
    return $db->photos->find()->toArray();
}

function manage_upload($id, &$photo) {
    $max_size = 1048576;
    $format = ['image/jpeg', 'image/png'];
    $db = get_db();

    $img_info = finfo_open(FILEINFO_MIME_TYPE);
    $img_name = $photo['temp_path'];
    $photo['type'] = finfo_file($img_info, $img_name);

    if(($photo['size'] <= $max_size) && in_array($photo['type'], $format)){
        $directory = 'images/original/';
        $file_name = basename($photo['name']);
        $path = $directory . $file_name;
        if(!empty($photo['watermark'])){
            add_watermark($photo);
        }
        create_thumbnail($photo);
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

function add_watermark($photo){
    switch($photo['type']){
        case 'image/jpeg':
            $image = imagecreatefromjpeg($photo['temp_path']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($photo['temp_path']);
            break;
    }
    $width = imagesx($image);
    $height = imagesy($image);
    $clone = imagecreatetruecolor($width, $height);
    imagecopy($clone, $image, 0, 0, 0, 0, $width, $height);

    $white = imagecolorallocate($clone, 255, 255, 255);
    $black = imagecolorallocate($clone, 0, 0, 0);

    imagettftext($clone, 30, 0, 30, 30, $white, 'static/AllerDisplay.ttf', '© ' . $photo['watermark']);
    imagettftext($clone, 30, 0, 30, 100, $black, 'static/AllerDisplay.ttf', '© ' . $photo['watermark']);

    imagepng($clone, "images/watermark/" . $photo['name']);
    imagedestroy($clone);
}

function create_thumbnail($photo){
    switch($photo['type']){
        case 'image/jpeg':
            $image = imagecreatefromjpeg($photo['temp_path']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($photo['temp_path']);
            break;
    }

    $src_width = imagesx($image);
    $src_height = imagesy($image);
    $width = 200;
    $height = 125;
    $clone = imagecreatetruecolor($width, $height);
    imagecopyresampled($clone, $image, 0, 0, 0, 0, $width, $height, $src_width, $src_height);

    imagepng($clone, "images/thumbnail/" . $photo['name']);
    imagedestroy($clone);

}

function pages($model){
    $photos = $model['photos'];
}