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
        char_delete($link, $id);
        header("Location: /?page=characters&game=".$game);
    } elseif ($action == 'add') {
    	$description = $_POST['description'];
    	$price = $_POST['price'];
        $server = $_POST['server'];
    	$game = $_GET['game'];
    	char_add($link, $game, $server, $description, $price);
    	header("Location: /?page=characters&game=".$game);
    }

} else {
    $items = chars_all($link, $game);
    include('./views/characters.php');
}

function chars_all($link, $game){
    $query = "SELECT id, server, description, price FROM characters WHERE game = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }

    return $items;
}

function char_delete($link, $id){
	$query = "DELETE FROM characters WHERE id=".$id;

	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

function char_add($link, $game, $server, $description, $price){

	$query = "INSERT INTO characters (game, server, description, price) VALUES ('".$game."', '".$server."', '".$description."', '".$price."')";
	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

?>