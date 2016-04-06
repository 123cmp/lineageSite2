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
        item_delete($link, $id);
        header("Location: /items_lin/".$game);
    } elseif ($action == 'add') {
    	$name = $_POST['name'];
    	$price = $_POST['price'];
        $server = $_POST['server'];
    	$game = $_GET['game'];
    	item_add($link, $game, $name, $server, $price);
    	header("Location: /items_lin/".$game);
    }

} else {
    $items = items_all($link, $game);
    include('views/items_lin.php');
}

function items_all($link, $game){
    $query = "SELECT id, server, name, price FROM items_lin WHERE game = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }

    return $items;
}

function item_delete($link, $id){
	$query = "DELETE FROM items_lin WHERE id=".$id;

	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

function item_add($link, $game, $server, $name, $price){

	$query = "INSERT INTO items_lin (game, server, name, price) VALUES ('".$game."', '".$server."', '".$name."', '".$price."')";
	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

?>