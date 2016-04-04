<?php
if(!@include('modules/db.php')){
	require_once('../modules/db.php');
}
$link = db_connect();

$q = json_encode($_GET);
file_put_contents("log.log", $q, FILE_APPEND);
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'delete'){
    	$id = $_GET['id'];
        order_delete($link, $id);
        header("Location: /orders");
    }
} else {
    $items = orders_all($link);
    include('views/orders.php');
}

function orders_all($link){
    $query = "SELECT * FROM orders WHERE 1";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }

    return $items;
}

function order_delete($link, $id){
	$query = "DELETE FROM orders WHERE id=".$id;

	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

?>