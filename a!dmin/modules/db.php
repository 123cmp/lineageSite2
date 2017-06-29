<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '1234');
define('MYSQL_DB', 'lineage2');

//как на хостинге
/*define('MYSQL_SERVER', '127.0.0.1');
define('MYSQL_USER', 'u0142097_root');
define('MYSQL_PASSWORD', 'Luxory-Admin123');
define('MYSQL_DB', 'u0142097_lineagesite');*/

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Error: ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error: ".mysqli_error($link));
    }
    return $link;
}

