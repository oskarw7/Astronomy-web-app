<?php
foreach($photos as $photo){
    $parts = explode('.', $photo['name']);
    $base = $parts[0];
    $extension = $parts[1];
    $watermark = "images/watermark/" . $base . "." . $extension;
    $thumbnail = "images/thumbnail/" . $base . "." . $extension;
    echo '<div class="photos_php">';
    echo '<a href="' . $watermark . '"><img src="' . $thumbnail . '" alt=""/></a>';
    echo '<p>Tytuł: ' . $photo['title'] . '</p>';
    echo '<p>Autor: ' . $photo['author'] . '</p>';
    if(isset($_SESSION['selected']) && in_array($photo['_id'], $_SESSION['selected'])){
        echo '<input type="checkbox" name="selected[]" value="' . $photo['_id'] . '" checked>';
    }
    else{
        echo '<input type="checkbox" name="selected[]" value="' . $photo['_id'] . '">';
    }
    echo '</div>';
    }
