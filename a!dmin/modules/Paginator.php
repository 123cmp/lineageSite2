<?php
function getPage($key, $game) {
    $page = "";
    switch($key) {
        case 'items': $page = '/services/items.php'; break;
        case 'orders': $page = '/services/orders.php'; break;
        case 'items_lin': $page = 'services/items_lin.php'; break;
        case 'characters': $page = 'services/characters.php'; break;
        case 'adena': $page = 'views/adena.php'; break;
        default: $page = 'services/orders.php'; //потом будет
    }

    return $page;
}