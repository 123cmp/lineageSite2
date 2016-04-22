<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

$game_data = array();
$game_rate = array();
$order_virtual_table = array();

$host='localhost';
$database='for_test';
$user='root';
$pswd='';

$dbh = mysqli_connect($host, $user, $pswd, $database ) or die("cant connect to MySQL.");

// ---------- GAMES ----------

if(isset($_GET['games'])) {

    if($_GET['games'] == "all") {

        $counter = 0;
        $game_name = "";

        $query = "SELECT * FROM games_list";
        $res = mysqli_query($dbh, $query);

        while($row = mysqli_fetch_array($res)) {

            $menu_name = "null";

            switch ($row['menu_type']) {
                case "calculator":
                    $menu_name = "Купить валюту";
                    break;
                case "items":
                    $menu_name = "Купить предметы";
                    break;
                case "accounts":
                    $menu_name = "Купить аккаунт";
                    break;
                case "boost":
                    $menu_name = "Прокачка";
                    break;
                };

            if ($game_name != $row['game_name']) {
                $game_data[] = array(
                    'img' => $row['img'],
                    'name' => $row['game_name'],
                    'menu' => array()
                );
            } else {
                $counter--;
            }
            $menu = array(
                'name' => $menu_name,
                'type' => $row['menu_type'],
                'currency' => $row['param_currency'],
                'game_name' => $row['game_name']);

            $game_data[$counter]["menu"][] = $menu;

            $game_name = $row['game_name'];
            $counter++;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($game_data);
    }
}

// ---------- GAME - CURRENCY ----------

if(isset($_GET['game']) && isset($_GET['currency'])) {
    $server_name = "";
    $game_name = $_GET['game'];
    $server_currency = $_GET['currency'];

    $query = "SELECT * FROM rates WHERE game = '".$game_name."'  AND currency = '".$server_currency."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {

        $sales = array();
        $server_id = $row['id'];

        if ($row['server'] == null) {
            $server_name = $row['game'];
        } else {
            $server_name = $row['server'];
        }

        $s_query = "SELECT * FROM `sales` WHERE rate_id = $server_id";
        $s_res = mysqli_query($dbh, $s_query);
        while ($s_row = mysqli_fetch_array($s_res)) {

            $sales[] = array(
                'from' => $s_row['count'],
                'value' => $s_row['value']
            );
        }

        $game_rate["servers"][] = array(
            'name' => $server_name,
            'rate' => $row['price'],
            'sum' => $row['count'],
            'sales' => $sales
        );
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($game_rate);
}

// ---------- GAME - ITEMS ----------

if(isset($_GET['items'])) {

    $items_gamename = $_GET['items'];
    $items = array();

    $query = "SELECT * FROM items WHERE game = '".$items_gamename."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {

        $items[] = array(
            'server' => $row['server'],
            'name' => $row['name'],
            'cost' => $row['price'],
        );
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($items);
}

// ---------- GAME - ACCOUNTS ----------

if(isset($_GET['accounts'])) {

    $accounts_gamename = $_GET['accounts'];
    $accounts = array();

    $query = "SELECT * FROM characters WHERE game = '".$accounts_gamename."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {

        $accounts[] = array(
            'server' => $row['server'],
            'description' => $row['description'],
            'cost' => $row['price'],
        );
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($accounts);
}

// ---------- POST - ORDERS ----------

if(isset($_POST['orders'])) {

    if($_POST['orders'] == "true") {

        $order_game_name = $_POST['game_name'];
        $order_game_server = $_POST['game_server'];
        $order_currency = $_POST['currency'];
        $order_count = $_POST['count'];
        $order_game_nick = $_POST['game_nick'];
        $order_contact = $_POST['contact'];
        $order_comment = $_POST['comment'];
        $order_date = time();

        //calc






        //dudos-defender
        //watch all rows
//        for ($x = 0; $x < count($order_virtual_table); $x++) {
//            if ($order_date - $order_virtual_table->time > 30 ) {
//                //delete row
//            }
//            echo $x;
//        }
//
//        $order_vt_count =
//        foreach ($order_virtual_table as $value) {
//            if ($order_date - $value->time > 30 ) {
//
//            }
//        }
//
//        $order_virtual_table[] = array(
//            "game" => $order_game_name,
//            "server" => $order_game_server,
//            "money" => "999",
//            "currency" => $order_currency,
//            "number" => $order_count,
//            "nickname" => $order_game_nick,
//            "contact" => $order_contact,
//            "comment" => $order_comment,
//            "time" => $order_date
//        );






        $query = "INSERT INTO orders (game, server, money, currency, number, nickname, contact, comment)".
            " VALUES ('".$order_game_name."', '".$order_game_server."', '99', '".$order_currency."', '".$order_count."', '".$order_game_nick."',".
            " '".$order_contact."', '".$order_comment."')";

        $result = mysqli_query($dbh, $query);
        if (!$result)
            die(mysqli_error($dbh));
    }
}
?>
