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


}


function creatnewchecklist($userid,$conn){
        $checklistName = $_GET['title'];
        $date = date("Y-m-d");
        $query = "INSERT INTO check_list (owner_id, title, creationDate) VALUES ('$userid','$checklistName','$date')";
        $conn->exec($query);
        $id = $conn->lastInsertId();

        echo $id;
}


function creatItem($conn){
    $checklistid = $_GET['checklistId'];
    $required = $_GET['required'];
    $type = $_GET['type'];
    $date = date("Y-m-d");

    $query = "INSERT INTO item_list (list_id,required,dataType,creationDate) values ('$checklistid',$required,'$type','$date')";
    $conn->exec($query);

    $id = $conn->lastInsertId();
    echo $id;


    /*echo "<script>
           function newitem() {
                    var value = ".$type.";".
                   "var type;
                    switch(value) {
                        case value='checkbox':
                            type = '<div class=\"item\"> <input type=\"checkbox\" id=\"$inputID\"> <div class=\"toggle\"> <label for=\"$inputID\"><i></i></label></div></div>';
                            break;
                        case value='shortdata':
                            type = '<input type=\"text\" id=\"$inputID\" class=\"form-control\" maxlength=\"10\" >';
                            break;
                        case value='longdata':
                            type = '<input type=\"text\" id=\"$inputID\" class=\"form-control\">';
                            break;
                    }
                    t.row.add( [
                        '<input type=\"text\" id=\"$itemTitleID\"  class=\"form-control\"><div style=\"Display:none\">$id<div>',
                        type,
                        '<input type=\"text\" id=\"$descreptionID\" class=\"form-control\">'
                    ] ).draw( false );
                }
           // Automatically add a first row of data
            newitem();
            </script>";*/

}