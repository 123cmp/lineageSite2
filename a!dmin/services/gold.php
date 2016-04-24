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
        header("Location: /?page=gold&game=".$game);
    } elseif ($action == 'add') {
        $currency = $_POST['currency'];
        $price = $_POST['price'];
        $game = $_GET['game'];
        $count = $_POST['count'];
        $server = $_POST['server'];
        

        item_add($link, $server, $count, $price, $game, $currency);
        header("Location: /?page=gold&game=".$game);
    } elseif($action == 'get_sales'){
    	$server_id = $_POST['r_id'];
    	$items = get_sales($link, $server_id);
    	echo json_encode($items);
    } elseif($action == 'delete_sale'){
    	$s_id = $_POST['s_id'];
    	delete_sale($link, $s_id);
    	
    } elseif($action == 'add_sale'){
    	$r_id = $_POST['r_id'];
    	$count = $_POST['count'];
    	$value = $_POST['value'];
    	$res = add_sale($link, $r_id, $count, $value);
    	echo json_encode($res);
    }

} else {
    
    $items = items_all($link, $game);
    $currency = get_currency($link, $game); 
    include('./views/gold.php');
}

function items_all($link, $game){
    $query = "SELECT * FROM rates WHERE game = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }
    for($i = 0; $i<count($items); $i++){
        $items[$i]['price'] = $items[$i]['price'] * $items[$i]['count'];
        $items[$i]['count'] = number_format($items[$i]['count'],0,'',' ');
    }
    
    return $items;
}

function item_delete($link, $id){
    $query = "DELETE FROM rates WHERE id=".$id;

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

function item_add($link, $server, $count, $price, $game, $currency){

    $price = $price / $count;
    $query = "INSERT INTO rates (server, count, price, game, currency_name) VALUES ('".$server."', '".$count."', '".$price."', '".$game."', '".$currency."')";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

function get_sales($link, $server_id){

    $query = 'SELECT * FROM sales WHERE rate_id = '.$server_id;
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }
    return $items;

}

function delete_sale($link, $s_id){

	$query = "DELETE FROM sales WHERE id=".$s_id;
	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

}

function add_sale($link, $rate_id, $count, $value){

	$query = "INSERT INTO sales (rate_id, count, value) VALUES ('".$rate_id."', '".$count."', '".$value."')";
	$result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $id = mysqli_insert_id($link);
    return $id;
}

function get_currency($link, $game){
    
    $query = "SELECT currency_name FROM currency WHERE game_name = '".$game."'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $items[] = $row;
    }
    return $items;
}
?>