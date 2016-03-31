<?php
$items = items_all($link, $game);
require_once("services/items.php");
//$action = $_GET['action'];
//if($action == 'delete'){
//	$id =  $_GET['id'];
//	delete($link, $game, $id);
//	getPage($game);
//}



function items_all($link, $game){
    $query = "SELECT * FROM ".$game."_items WHERE 1";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }

    return $items;
}

function delete($link, $game, $id){
	$query = "DELETE FROM ".$game."_items WHERE id=".$id;

	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

?>