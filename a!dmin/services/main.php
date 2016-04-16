<?php
if(!@include('modules/db.php')){
	require_once('../modules/db.php');
}
$link = db_connect();


   


function games_all($link){
    $query = "SELECT * FROM games WHERE 1";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $games = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $games[] = $row;
    }

    return $games;
}
function get_pages($link, $game){

    $query = "SELECT pages FROM games WHERE alias = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $pages = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $pages[] = $row;
    }

    return $pages;

}

?>