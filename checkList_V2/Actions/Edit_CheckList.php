<?php

session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];

$lists = $conn->prepare("SELECT id , title FROM check_list WHERE owner_id = '$USER_ID'");
$lists->execute();

$checklists = array();
foreach ($lists as $item)
{
    //
    $checlist = array(
        'id'=>$item[0],
        'title'=>$item[1],
        'items'=>$result
    );

    array_push($checklists,$checlist);
}


$_SESSION['check_list'] = $checklists;
header('Location: ../EditCheckLIst.php');
