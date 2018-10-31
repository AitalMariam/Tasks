<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];

$result = array();
$lists = $conn->prepare("SELECT id,title FROM check_list WHERE id NOT IN (SELECT list_id FROM submit_item where user_id ='$USER_ID')");
$lists->execute();
$result = array();
foreach ($lists as $val)
{
    $temp = array(
        'id'=>$val['id'],
        'title'=>$val['title']
    );
    array_push($result,$temp);
}
$_SESSION['use_check_list'] = $result;
header('Location: ../USE_CHECKLISTS.php');