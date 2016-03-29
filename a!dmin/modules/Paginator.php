<?php
function getPage($key) {
    $page = "";
    switch($key) {
        case 'items': $page = 'views/items.php'; break;
/*      case 'contacts': $page = 'views/contacts.php'; break;
        case 'guarantee': $page = 'views/guarantee.php'; break;
        case 'main': $page = 'views/main.php'; break;
        case 'importers': $page = 'views/importers.php'; break;
        case 'rework': $page = 'views/rework.php'; break;
        case 'reviews': $page = 'views/reviews.php'; break;
        case 'po': $page = 'views/po.php'; break;
        case 'dota': $page = 'views/dota.php'; break;
        case 'cs': $page = 'views/cs.php'; break;
        case 'l2exp': $page = 'views/l2_exp.php'; break;
        case 'l2items': $page = 'views/l2_items.php'; break;*/
        default: $page = 'views/404.php'; //потом будет
    }

    return $page;
}