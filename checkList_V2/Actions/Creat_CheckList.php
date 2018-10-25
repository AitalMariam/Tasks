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
    $date = date("Y-m-d");

    $query = "INSERT INTO item_list (list_id,required,dataType,creationDate) values ('$checklistid',$required,'$type','$date')";
    $conn->exec($query);

    echo $conn->lastInsertId();
}

/**
 * save row changes
 */
function editItem($conn)
{
    if(!empty($_GET['answer'])){
        $id = $_GET['itemid'];
        $answer = $_GET['answer'];
        $conn->exec("UPDATE item_list SET answer ='$answer' WHERE id='$id'");
    }

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
}