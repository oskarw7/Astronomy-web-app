<?php
echo '<div class="pages">';
if($page > 1){
    echo '<div class="page_button">';
    echo '<a href="?page=' . ($page - 1) . '">Poprzednia strona</a>';
    echo '</div>';
}
if($page >= 1){
    echo '<span>Strona ' . $page . ' z ' . $total_pages . '</span>';
}
if($page < $total_pages){
    echo '<div class="page_button">';
    echo '<a href="?page=' . ($page + 1) . '">Następna strona</a>';
    echo '</div>';
}
echo '</div>';
