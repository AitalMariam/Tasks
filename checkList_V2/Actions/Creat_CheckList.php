<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];
$ButtonCall = $_GET['button'];

switch ($ButtonCall) {
    case 'creatChecklist':
        creatnewchecklist($USER_ID,$conn);
        break;
    case 'newitem':
        creatItem($conn);
        break;
    case 'edititem':
        editItem($conn);

}


function creatnewchecklist($userid,$conn){
        $checklistName = $_GET['title'];
        $date = date("Y-m-d");
        $query = "INSERT INTO check_list (owner_id, title, creationDate) VALUES ('$userid','$checklistName','$date')";
        $conn->exec($query);
        $id = $conn->lastInsertId();

        echo $id;
}


function creatItem($conn)
{
    $checklistid = $_GET['checklistId'];
    $required = $_GET['required'];
    $type = $_GET['type'];
    $title = $_GET['title'];
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO item_list (list_id,title,required,dataType,creationDate,Submited) values ('$checklistid','$title',$required,'$type','$date','no')";
    $conn->exec($query);

    //
    $insertedId = $conn->lastInsertId();
    //get count of items iin current list
    $sql = "SELECT count(*) FROM item_list WHERE list_id = '$checklistid'";
    $result = $conn->prepare($sql);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
    //
    //Set item order
    $query = "UPDATE item_list SET item_order = '$number_of_rows' WHERE id = '$insertedId'";
    $conn->exec($query);
    //

    echo $insertedId;
}

/**
 * save row changes
 */
function editItem($conn)
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
    if(!empty($_GET['required'] == 0 || $_GET['required'] == 1)){
        $id = $_GET['itemid'];
        $required = $_GET['required'];
        echo $required;
        $conn->exec("UPDATE item_list SET required = '$required' WHERE id='$id'");
    }

    /*if(!empty($_GET['answer'])){

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

    }*/
}