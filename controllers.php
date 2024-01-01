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
        'title' => null,
        'watermark' => null,
        'watermark_path' => null,
        'thumbnail_path' => null,
        'checked' => '',
        '_id' => null,
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $photo = [
            'name' => $_FILES['photo']['name'],
            'size' => $_FILES['photo']['size'],
            'temp_path' => $_FILES['photo']['tmp_name'],
            'author' => $_POST['author'],
            'title' => $_POST['title'],
            'watermark' => $_POST['watermark'],
        ];
        $max_size = 1048576;
        $format = ['image/jpeg', 'image/png'];

        $img_info = finfo_open(FILEINFO_MIME_TYPE);
        $img_name = $photo['temp_path'];
        $photo['type'] = finfo_file($img_info, $img_name);
        $parts = explode('/', $photo['type']);
        $extention = '.' . $parts[1];
        $photo['name'] = uniqid() . $extention;

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
            $model['error'] = 'Zdjęcie jest za duże. Dopuszczalny rozmiar zdjęcia to 1MB. Zdjęcie musi być w formacie JPG lub PNG.';
        }
        elseif($photo['size'] > $max_size){
            $model['error'] = 'Zdjęcie jest za duże. Dopuszczalny rozmiar zdjęcia to 1MB.';
        }
        elseif(!in_array($photo['type'], $format)){
            $model['error'] = 'Zdjęcie musi być w formacie JPG lub PNG.';
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
        $photos_page = array_slice($photos, $start, $photos_per_page);
        foreach($photos_page as $photo){
            $parts = explode('.', $photo['name']);
            $base = $parts[0];
            $extension = $parts[1];
            $photo['watermark_path'] = "images/watermark/" . $base . "." . $extension;
            $photo['thumbnail_path'] = "images/thumbnail/" . $base . "." . $extension;
            if(isset($_SESSION['selected']) && in_array($photo['_id'], $_SESSION['selected'])){
                $photo['checked'] = 'checked';
            }
            else{
                $photo['checked'] = '';
            
            }
        }
        $model['photos'] = $photos_page;
        $model['total_pages'] = $total_pages;
        $model['page'] = $page;
    }
    return 'galeria';
}

function user(&$model){
    
    return 'user';
}

function register(&$model){
    $user = [
        'email' => null,
        'login' => null,
        'password' => null,
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
        $user['login'] = $login;
        $user['email'] = $email;
        if($password === $repeat_password){
            if(find_user($user)){
                $model['reg_error'] = 'Podany login lub email jest już zajęty.';
            }
            else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $user = [
                    'email' => $email,
                    'login' => $login,
                    'password' => $password,
                ];
                $model['user'] = $user;
                if(save_user($user)){
                    return 'redirect:login';
                }
            }
        }
        else {
            $model['reg_error'] = 'Hasła nie są takie same.';
        }
    }
    return 'register';
}

function login(&$model){
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        return 'user';
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $user = [
            'login' => $_POST['login'],
            'password' => $_POST['password'],
        ];
        $find_user = get_user($user);
        if($find_user){
            if(password_verify($user['password'], $find_user['password'])){
                $_SESSION = [];
                session_regenerate_id();
                $_SESSION['user_id'] = $find_user['_id'];
                $_SESSION['logged_in'] = true;
                $model['user'] = $find_user;
                $model['success']= 'Zalogowano pomyślnie.';
                return 'redirect:user';
            }
            else{
                $model['log_error'] = 'Niepoprawne hasło.';
            }
        }
        else{
            $model['log_error'] = 'Niepoprawny login.';
        }
    }
    return 'login';
}

function logout(&$model){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() -42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"] );
    session_unset();
    session_destroy();
    return 'redirect:login';
}

function save_selected(&$model){
    if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['selected'])){
        if(!isset($_SESSION['selected'])){
            $_SESSION['selected'] = [];
        }
        $_SESSION['selected'] = array_merge($_SESSION['selected'], $_POST['selected']);
    }
    return 'redirect:galeria';
}

function delete_selected(&$model){
    if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['delete_selected'])){
        if(isset($_SESSION['selected'])){
            $_SESSION['selected'] = array_diff($_SESSION['selected'], $_POST['delete_selected']);
        }
    }
    return 'redirect:selected_photos';
}

function selected_photos(&$model){
    $photos = get_photos();
    $model['photos'] = $photos;
    $selected_photos = [];
    if(!isset($_SESSION['selected']) || empty($_SESSION['selected'])){
        return 'redirect:galeria';
    }
    foreach($photos as $photo){
        if(isset($_SESSION['selected']) && in_array($photo['_id'], $_SESSION['selected'])){
            $parts = explode('.', $photo['name']);
            $base = $parts[0];
            $extension = $parts[1];
            $photo['watermark_path'] = "images/watermark/" . $base . "." . $extension;
            $photo['thumbnail_path'] = "images/thumbnail/" . $base . "." . $extension;
            array_push($selected_photos, $photo);
        }
    }
    $model['selected_photos'] = $selected_photos;
    $count_photos = count($selected_photos);
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
        $photos_page = array_slice($selected_photos, $start, $photos_per_page);
        $model['selected_photos'] = $photos_page;
        $model['total_pages'] = $total_pages;
        $model['page'] = $page;
    }
    return 'selected_photos';
}