<?php
if(!@include('modules/db.php')){
	require_once('../modules/db.php');
}
$link = db_connect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'delete'){
    	$id = $_GET['id'];
    	$game = $_GET['game'];
        item_delete($link, $game, $id);
        header("Location: /".$game);
    } elseif ($action == 'add') {
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$game = $_GET['game'];
    	item_add($link, $game, $name, $price);
    	header("Location: /".$game);
    }

} else {
    $game = 'dota2';
    $items = items_all($link, $game);
    include('views/items.php');
}

function items_all($link, $game){
    $query = "SELECT * FROM items WHERE game = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }

    return $items;
}

function item_delete($link, $game, $id){
	$query = "DELETE FROM ".$game."_items WHERE id=".$id;

	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

function item_add($link, $game, $name, $price){

	$query = "INSERT INTO ".$game."_items (name, price) VALUES ('".$name."', '".$price."')";
	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

?>