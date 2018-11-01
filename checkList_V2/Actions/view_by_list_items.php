<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];
$listId =  $_GET['listid'];
//Get items with answers
$query = 'select title ,answer ,description from item_list JOIN item_answer on item_list.id = item_answer.item_id
          where item_list.list_id = '.$listId.' and item_answer.user_id = '.$USER_ID;

$items = $conn->prepare($query);
$items->execute();

$result = array();
foreach ($items as $item){
    $temp = array(
        'item_title'=>$item[0],
        'item_answer'=>$item[1],
        'item_description'=>$item[2],
    );
    array_push($result,$temp);
}
var_dump($result);
$_SESSION['view_bylist_items'] = $result;
header('Location: ../view_by_list_items.php?title='.$_GET['title']);