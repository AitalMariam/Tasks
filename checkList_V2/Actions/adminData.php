<?php
session_start();
include "Database/Connection.php";

$lists = $conn->prepare("SELECT id,title FROM check_list");
$lists->execute();

$result = array();
foreach ($lists as $list)
{
    $list_id = $list['id'];
    // get list submited users
    $users = $conn->prepare("SELECT id,name FROM user WHERE id IN (SELECT user_id FROM submit_item where list_id =  '$list_id')");
    $users->execute();

    $list_users = array();
    foreach ($users as $user)
    {
        $temp = array(
          'id'=>$user['id'],
          'name'=>$user['name']
        );
        array_push($list_users,$user);
    }
    //
   $temp = array(
      'list_id'=>$list_id,
      'list_title'=>$list['title'],
      'sub_users'=>$list_users
    );
    array_push($result,$temp);
}


$_SESSION['admin_list'] = array_reverse($result);
header('Location: ../adminView.php');