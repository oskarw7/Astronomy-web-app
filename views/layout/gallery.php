<?php
foreach($photos as $photo){
    echo '<div class="photos_php">';
    echo '<a href="' . $photo['watermark_path'] . '"><img src="' . $photo['thumbnail_path'] . '" alt=""/></a>';
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