<?php
session_start();
include "Database/Connection.php";
//$listId =  $_GET['id'];


$USER_ID = $_SESSION['user_id'];
$ButtonCall = $_GET['button'];

switch ($ButtonCall) {

    case 'edititem':
        editItem($conn,$USER_ID);
}


/**
 * save row changes
 */
function editItem($conn,$userid)
{

    if(!empty($_GET['title'])){
        $id = $_GET['itemid'];
        $title = $_GET['title'];
        $conn->exec("UPDATE item_list SET title='$title' WHERE id='$id'");
    }
    if(!empty($_GET['description'])){
        $id = $_GET['itemid'];
        $descreption = $_GET['description'];
        $conn->exec("UPDATE item_list SET description = '$descreption' WHERE id='$id'");
    }

    if($_GET['required'] == 0 || $_GET['required'] == 1){
        $id = $_GET['itemid'];
        $required = $_GET['required'];
        $conn->exec("UPDATE item_list SET required = '$required' WHERE id ='$id'");
    }

    if(!empty($_GET['answer'])){

        $id = $_GET['itemid'];
        $answer = $_GET['answer'];
        // check answer if exists
        $check = $conn->prepare("SELECT id FROM item_answer WHERE user_id = '$userid' AND item_id = '$id' LIMIT 1");
        $check->execute();
        if($check->rowCount() == 1)
        {
            $query = "UPDATE item_answer set answer = '$answer' WHERE user_id = '$userid' AND item_id = '$id' ";
            $conn->exec($query);
        }
        else
        {
            $query = "INSERT INTO item_answer (answer,item_id,user_id) values ('$answer',$id,'$userid')";
            $conn->exec($query);
        }

    }
}