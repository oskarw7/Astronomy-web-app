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

function galeria(&$model){
    return 'galeria';
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
            'type' => $_FILES['photo']['type'],
            'temp_path' => $_FILES['photo']['tmp_name'],
            'author' => $_POST['author'],
            'watermark' => $_POST['watermark'],
        ];
        if(manage_upload($id, $photo)){
            return 'redirect:galeria';
        }
    }

    return 'upload';
}