<?php
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