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
    //Get items

    $items = $conn->prepare("SELECT id, title, description,dataType FROM item_list WHERE list_id = '$item[0]'");
    $items->execute();
    $result = array();

    foreach ($items as $list_item)
    {
        // Get LI Answer for current user
        $answer = $conn->prepare("SELECT id, answer FROM item_answer WHERE item_id = '$list_item[0]' AND user_id = '$USER_ID' LIMIT 1");
        $answer->execute();
        $answerelement = array();
        foreach ($answer as $val)
        {
            $temp = array(
                'answer_id'=>$val['id'],
                'answer_content'=>$val['answer']
            );
            array_push($answerelement,$temp);
        }
        var_dump($answerelement);
        //
        $li = array(
            'item_id'=>$list_item[0],
            'item_title'=>$list_item[1],
            'item_description'=>$list_item[2],
            'item_datatype'=>$list_item[3],
            'item_answer'=>$answerelement
        );
        array_push($result,$li);
    }
    //
    $checlist = array(
        'id'=>$item[0],
        'title'=>$item[1],
        'items'=>$result
    );

    array_push($checklists,$checlist);

}


$_SESSION['Edit_list_items'] = $checklists;
header('Location: ../EditCheckLIst.php');
