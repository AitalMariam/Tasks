<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];


$lists = $conn->prepare("SELECT id,title,creationDate from check_list where id IN (SELECT list_id from submit_item WHERE user_id = '$USER_ID')");
$lists->execute();

$result = array();
foreach ($lists as $list)
{
  $temp = array(
    'list_id'=>$list['id'],
    'list_name'=>$list['title'],
    'list_creationDate'=>$list['creationDate']
  );
  array_push($result,$temp);
}
$_SESSION['view_by_list'] = $result;
header('Location: ../view_by_list.php');