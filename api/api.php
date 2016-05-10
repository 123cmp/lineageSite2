<?php

require_once('../a!dmin/modules/db.php');
ini_set('display_errors',1);
error_reporting(E_ALL);

/*
$host='localhost';
$database='lineage2';
$user='root';
$pswd='';

$dbh = mysqli_connect($host, $user, $pswd, $database ) or die("cant connect to MySQL.");
*/

$dbh = db_connect();

// ---------- GAMES ----------

if(isset($_GET['games'])) {
    if($_GET['games'] == "all") {

        $game_data = array();
        $counter = 0;
        $game_name = "";
        $menu_name = "";

        $query = "SELECT games.*, currency.currency_name FROM games LEFT JOIN currency ON games.alias = currency.game_name";
        $res = mysqli_query($dbh, $query);

        while($row = mysqli_fetch_array($res)) {
//            echo print_r($row)."<br>";
            $menu = array();
            $pages = explode(",", $row["pages"]);

            foreach ($pages as $page) {
                $currency = "";
                switch ($page) {
                    case "gold":
                        $currency = $row["currency_name"];
                        $menu_name = "Купить " .$currency;
                        break;
                    case "items":
                        $menu_name = "Купить предметы";
                        break;
                    case "characters":
                        $menu_name = "Купить аккаунт";
                        break;
                    case "boost":
                        $menu_name = "Прокачка";
                        break;
                };
                $menu[] = array(
                    "name" => $menu_name,
                    "type" => $page,
                    "currency" => $currency,
                    "game" =>$row['alias']
                );
            }
            unset($page);

            if ($game_name != $row['game_name']) {
                $game_data[] = array(
                    'img' => $row['img'],
                    'name' => $row['game_name'],
                    'alias' => $row['alias'],
                    'menu' => array()
                );
                $game_data[$counter]["menu"] = $menu;

            } else {
                $counter--;

                foreach ($menu as $menu_one) {
                    if ($menu_one["currency"] != "") {
                        $game_data[$counter]["menu"][] = $menu_one;
                    }
                }
            }

            $game_name = $row['game_name'];
            usort($game_data[$counter]["menu"], build_sorter("name"));
            $counter++;
        }
        echo json_encode($game_data);
    }
}
//sort: order by key
function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

// ---------- GAME - CURRENCY ----------

if(isset($_GET['game']) && isset($_GET['currency'])) {

    //2 requests to DB because that tables has 2 similar fields 'count', and hard to build json
    $game_rate = array();
    $server_name = "";
    $game_name = $_GET['game'];
    $server_currency = $_GET['currency'];

    $query = "SELECT * FROM rates WHERE game = '".$game_name."'  AND currency_name = '".$server_currency."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {

        $sales = array();
        $server_id = $row['id'];

        if ($row['server'] == null) {
            $server_name = $row['game'];
        } else {
            $server_name = $row['server'];
        }

        $s_query = "SELECT * FROM sales WHERE rate_id = '".$server_id."'";
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

// ---------- GAME - CURRENCY ----------

if(isset($_GET['text']) && isset($_GET['game']) && isset($_GET['type'])) {
    $texts = array();
    $game_name = $_GET['game'];
    $type = $_GET['type'];

    $query = "SELECT * FROM texts WHERE game = '".$game_name."'  AND type = '".$type."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {

        $texts[] = array(
                'file' => $row['file']
        );
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($texts);
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

// ---------- GAME - BOOST ----------

if(isset($_GET['boost'])) {
    $boost_gamename = $_GET['boost'];

    $query = "SELECT desc_text FROM boost WHERE game = '".$boost_gamename."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($row["desc_text"]);
    }
}

// ---------- POST - ORDERS ----------

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(endsWith($actual_link, "orders=true")) {
    $body = json_decode(file_get_contents('php://input'));
    error_log($body->game_name);

        session_start();
        if (!isset($_SESSION['order_temp_table'])) {
            $_SESSION['order_temp_table'] = array();
        }

        $order_game_name = $body->game_name;
        $order_game_server = $body->game_server;
        $order_currency = $body->currency;
        $order_count = $body->count;
        $order_game_nick = $body->game_nick;
        $order_contact = $body->contact;
        $order_comment = $body->comment;
        $order_date = time();

        $order_current_order = array(
            "game" => $order_game_name,
            "server" => $order_game_server,
            "currency" => $order_currency,
            "number" => $order_count,
            "nickname" => $order_game_nick,
            "contact" => $order_contact,
            "comment" => $order_comment,
            "time" => $order_date
        );

        //dudos-defender
        if (count($_SESSION['order_temp_table']) > 0) {

            //delete old orders
            foreach ($_SESSION['order_temp_table'] as $i => $row) {
                if($order_date - $row['time'] > 30 ) {
                    unset($_SESSION['order_temp_table'][$i]);
                    //echo "old row delete, ";
                }
            }
            unset($row);

            //watch every row to clone of current order
            $hasClone = false;
            $clone_current_order = $order_current_order;
            unset($clone_current_order['time']);

            foreach ($_SESSION['order_temp_table'] as $row) {
                //compare orders without time
                $clone_row = $row;
                unset($clone_row['time']);
//                print_r($clone_current_order);
//                print_r($clone_row);

                if ($clone_current_order == $clone_row) {
                    $hasClone = true;
                    echo "clone found, ";
                    break;
                }
            }
            unset($row);

            //if clone of order not found - push it
            if (!$hasClone) {
                echo "pushing order, ";
                pushDataToDB($dbh, $order_current_order, $order_game_name, $order_game_server, $order_currency, $order_count, $order_game_nick, $order_contact, $order_comment);
            }
        } else {
            echo "first pushing order, ";
            pushDataToDB($dbh, $order_current_order, $order_game_name, $order_game_server, $order_currency, $order_count, $order_game_nick, $order_contact, $order_comment);
        }
}

function calculateMoney($dbh, $order_game_name, $order_game_server, $order_currency, $order_count) {

    $order_count_price = 0;
    $order_sale = 0;

    $query = "SELECT * FROM rates WHERE game = '".$order_game_name."' AND server = '".$order_game_server."'  AND currency = '".$order_currency."'";
    $res = mysqli_query($dbh, $query);
    while($row = mysqli_fetch_array($res)) {

        $order_rate_id = $row['id'];
        $order_count_price = $row['price'];
        $current_sale = 0;

        $s_query = "SELECT * FROM sales WHERE rate_id = '".$order_rate_id."'";
        $s_res = mysqli_query($dbh, $s_query);

        // find sale for current count
        while ($s_row = mysqli_fetch_array($s_res)) {
            if ($order_count > $s_row['count']) {
                $current_sale = $s_row['value'];
            } else {
                $order_sale = $s_row['value'];
                break;
            }
        }

        if ($order_sale == 0) {
            $order_sale = $current_sale;
        }

    }
    return ceil(($order_count * $order_count_price * (100 - $order_sale))) / 100;
}

function pushDataToDB($dbh, $order_current_order, $order_game_name, $order_game_server, $order_currency, $order_count, $order_game_nick, $order_contact, $order_comment) {

    //push to vt
    $_SESSION['order_temp_table'][] = $order_current_order;

    //push to DB
    $order_calc_money = calculateMoney($dbh, $order_game_name, $order_game_server, $order_currency, $order_count );
    echo $order_calc_money;
    $order_current_order['money'] = $order_calc_money;

    $query = "INSERT INTO orders (game, server, money, currency, number, nickname, contact, comment)".
        " VALUES ('".$order_game_name."', '".$order_game_server."', '".$order_calc_money."', '".$order_currency."', ".
        " '".$order_count."', '".$order_game_nick."', '".$order_contact."', '".$order_comment."')";

    $result = mysqli_query($dbh, $query);
    if (!$result)
        die(mysqli_error($dbh));
}


function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
?>


