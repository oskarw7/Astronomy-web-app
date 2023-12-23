<?php
require_once 'business.php';

function index(&$model){
    return 'index';
}

function gwiazdy(&$model){
    return 'gwiazdy';
}

function ankieta(&$model){
    return 'ankieta';
}

function upload(&$model){
    $photo = [
        'name' => null,
        'size' => null,
        'type' => null,
        'temp_path' => null,
        'author' => null,
        'watermark' => null,
        '_id' => null
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $photo = [
            'name' => $_FILES['photo']['name'],
            'size' => $_FILES['photo']['size'],
            'temp_path' => $_FILES['photo']['tmp_name'],
            'author' => $_POST['author'],
            'watermark' => $_POST['watermark'],
        ];
        $max_size = 1048576;
        $format = ['image/jpeg', 'image/png'];

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
            $model['photo']=$photo;
            if(save_photo($id, $photo, $path)){
                return 'redirect:galeria';
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
    }
    return 'upload';
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

function galeria(&$model){
    $photos = get_photos();
    $model['photos'] = $photos;
    $count_photos = count($photos);
    $photos_per_page = 4;
    if($count_photos > 0){
        if(isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }
        else{
            $page = 1;
        }
        $total_pages = ceil($count_photos / $photos_per_page);
        if($page > $total_pages){
            $page = $total_pages;
        }
        $start = ($page - 1) * $photos_per_page;
        $model['photos'] = array_slice($photos, $start, $photos_per_page);
        $model['total_pages'] = $total_pages;
        $model['page'] = $page;
    }
    return 'galeria';
}