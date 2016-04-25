<?php
if(!@include('../modules/db.php')){
	require_once('./modules/db.php');
}
$link = db_connect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'delete'){
    	$id = $_GET['id'];
       order_delete($link, $id);
       header("Location: /a!dmin/?page=orders");
    }
} elseif(!isset($_POST['data'])) {
    $items = orders_all($link);
    include('./views/orders.php');
}
if(isset($_POST['data'])){
    $data = json_decode($_POST['data']);
    set_status($link, $data[1], $data[0]);

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
function set_status($link, $id, $status){
    $query = "UPDATE orders SET status = '".$status."' WHERE id = ".$id;
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

?>