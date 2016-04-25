<?php
if(!@include('../modules/db.php')){
    require_once('./modules/db.php');
}
$link = db_connect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'text'){
        $game = $_GET['game'];
        $text = $_POST['text'];
        update_text($link, $text, $game);
        $text = boost_text($link, $game);
        header("Location: /a!dmin/?page=boost&game=".$game);
    } 

} else {
    
    $text = boost_text($link, $game);
    include('./views/boost.php');
}

function boost_text($link, $game){
    $query = "SELECT desc_text FROM boost WHERE game = '".$game."'";

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $text = mysqli_fetch_assoc($result);
    file_put_contents('log.log', json_encode($text)."\n", FILE_APPEND);

    if(empty($text['desc_text'])){
        $text['desc_text'] = '';
    }
    return $text['desc_text'];
}

function update_text($link, $text, $game){

    $query = "SELECT * FROM boost WHERE game = '".$game."'";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));
    

    if((mysqli_num_rows($result)) > 0) {

        mysqli_query($link, "UPDATE boost SET desc_text = '".$text."' WHERE game = '".$game."'");

    } else {
        
        $result = mysqli_query($link, "INSERT INTO boost (game, desc_text) VALUES ('".$game."', '".$text."')");
        if (!$result)
            die(mysqli_error($link));
    }
}

?>