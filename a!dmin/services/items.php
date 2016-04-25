<?php
if(!@include('../modules/db.php')){
	require_once('./modules/db.php');
}
$link = db_connect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'delete'){
    	$id = $_GET['id'];
    	$game = $_GET['game'];
        item_delete($link, $id);
        header("Location: /a!dmin/?page=items&game=".$game);
    } elseif ($action == 'add') {
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$game = $_GET['game'];
        if(isset($_POST['server'])){
            $server = $_POST['server'];
        } else {
            $server = null;
        }

    	item_add($link, $game, $name, $price, $server);
    	header("Location: /a!dmin/?page=items&game=".$game);
    }

} else {
    
    $items = items_all($link, $game);
    include('./views/items.php');
}

function items_all($link, $game){
    $query = "SELECT * FROM items WHERE game = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['server'] == null) {
            unset($row['server']);
        }
        $items[] = $row;
    }
    
    return $items;
}

function item_delete($link, $id){
	$query = "DELETE FROM items WHERE id=".$id;

	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

function item_add($link, $game, $name, $price, $server){

	$query = "INSERT INTO items (name, price, game, server) VALUES ('".$name."', '".$price."', '".$game."', '".$server."')";
	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

?>