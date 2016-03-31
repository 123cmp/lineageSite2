<?php
function getPage($key) {
    $page = "";
    switch($key) {
        case 'items': $page = 'views/items.php'; break;
        case 'orders': $page = 'views/orders.php'; break;
        case 'items_lin': $page = 'views/items_lin.php'; break;
        case 'characters': $page = 'views/characters.php'; break;
        case 'adena': $page = 'views/adena.php'; break;
        default: $page = 'views/404.php'; //потом будет
    }

    return $page;
}