<?php
session_start();
include "Database/Connection.php";


$query ='SELECT submit_item.list_id, submit_item.user_id ,submit_item.submitDate , check_list.title ,user.name  FROM submit_item 
JOIN check_list on submit_item.list_id = check_list.id 
JOIN user on submit_item.user_id = user.id 
order by submitDate';
$lists = $conn->prepare($query);
$lists->execute();

$result = array();
foreach ($lists as $list){
    $temp = array(
        'list_id'=>$list[0],
        'user_id'=>$list[1],
        'sub_date'=>$list[2],
        'list_title'=>$list[3],
        'user_name'=>$list[4]
    );
    array_push($result,$temp);
}
var_dump($result);

/*$lists = $conn->prepare("SELECT id,title FROM check_list");
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
*/

$_SESSION['admin_list'] = array_reverse($result);
header('Location: ../adminView.php');