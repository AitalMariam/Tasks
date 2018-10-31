<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];

$listId  = $_GET['list'];

$items = $conn->prepare("SELECT id, title, description,dataType, required FROM item_list WHERE list_id = '$listId' ORDER BY item_order ");
$items->execute();
$result = array();
foreach ($items as $list_item)
{
    $li = array(
        'item_id'=>$list_item[0],
        'item_title'=>$list_item[1],
        'item_description'=>$list_item[2],
        'item_datatype'=>$list_item[3],
        'item_required'=>$list_item[4],
    );
    array_push($result,$li);
}
//var_dump($result);
$_SESSION['use_list_items'] = $result;

header('Location: ../USE_CHECKLISTS_ITEM.php?name='.$_GET['name'].'&list_id='.$listId);
