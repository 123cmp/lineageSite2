<?php 
$items = items_all($link, $game);




function items_all($link, $game){
    $query = "SELECT * FROM ".$game."_items WHERE 1";
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