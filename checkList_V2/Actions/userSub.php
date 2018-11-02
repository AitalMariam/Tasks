<?php
session_start();
include "Database/Connection.php";
$list = $_GET['listid'];
$user = $_GET['userid'];

$items = $conn->prepare("SELECT id, title,description FROM item_list WHERE list_id='$list' ORDER by item_order");
$items->execute();

$result = array();
foreach ($items as $val )
{
    //Get item answer
    $itemId = $val['id'];
    $answer = $conn->prepare("SELECT answer FROM item_answer WHERE item_id = '$itemId' AND user_id ='$user'LIMIT 1");
    $answer->execute();
    $answerResult = $answer->fetch();
    //
    $temp = array(
      'item_title'=>$val['title'],
      'item_description'=>$val['description'],
      'item_answer'=>$answerResult['answer']
    );
    array_push($result,$temp);
}


$_SESSION['answers_list_by_user'] = $result;
header('Location: ../view_user_sub.php?list='.$_GET['title']);

