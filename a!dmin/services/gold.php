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
    }

} else {
    
    $items = items_all($link, $game);
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
    $query = "INSERT INTO rates (server, count, price, game, currency) VALUES ('".$server."', '".$count."', '".$price."', '".$game."', '".$currency."')";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

function get_sales($link $server_id){

    $query = 'SELECT count, value FROM sales WHERE rate_id = '.$server_id;
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