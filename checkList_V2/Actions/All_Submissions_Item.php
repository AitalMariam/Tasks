<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];
$listId =  $_GET['listid'];
//Get items with answers
/**$query = 'select title ,answer ,description from item_list JOIN item_answer on item_list.id = item_answer.item_id
where item_list.list_id = '.$listId.' and item_answer.user_id = '.$USER_ID;**/

$items = $conn->prepare("SELECT id, title,description FROM item_list WHERE list_id = '$listId'order by item_order");
$items->execute();

$result = array();
foreach ($items as $item)
{
    //get item answer
    $itemId = $item['id'];
    $answer = $conn->prepare("SELECT answer FROM item_answer WHERE item_id = '$itemId' AND user_id ='$USER_ID'LIMIT 1");
    $answer->execute();
    $answerResult = $answer->fetch();
    //
    $temp = array(
        'item_title'=>$item['title'],
        'item_description'=>$item['description'],
        'item_answer'=>$answerResult['answer']
    );

    array_push($result,$temp);
}

$_SESSION['all_submissions_items'] = $result;
header('Location: ../All_Submissions_Item.php?title='.$_GET['title']);