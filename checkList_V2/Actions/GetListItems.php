<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];
$listId =  $_GET['id'];
//Get items
$items = $conn->prepare("SELECT id, title, description,dataType, required FROM item_list WHERE list_id = '$listId' and Submited = 'no' ORDER BY item_order");
$items->execute();
$result = array();
foreach ($items as $list_item)
{
    // Get LI Answer for current user
    $answer = $conn->prepare("SELECT id, answer FROM item_answer WHERE item_id = '$list_item[0]' AND user_id = '$USER_ID' LIMIT 1");
    $answer->execute();
    $answerelement = array();
    foreach ($answer as $val)
    {
        $temp = array(
            'answer_id'=>$val['id'],
            'answer_content'=>$val['answer']
        );
        array_push($answerelement,$temp);
    }

    //
    $li = array(
        'item_id'=>$list_item[0],
        'item_title'=>$list_item[1],
        'item_description'=>$list_item[2],
        'item_datatype'=>$list_item[3],
        'item_required'=>$list_item[4],
        'item_answer'=>$answerelement,
    );
    array_push($result,$li);
}


$_SESSION['list_items'] = $result;

header('Location: ../EditCheckLIst_Item.php?name='.$_GET['name'].'&list_id='.$listId);