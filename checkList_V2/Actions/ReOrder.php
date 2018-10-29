<?php

session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];

// Get current check list id
$stmt = $conn->prepare("SELECT id FROM check_list ORDER BY id DESC LIMIT 1");
$stmt->execute();
$last_id = $stmt->fetchColumn();

// save new order
$old = $_GET['oldposition'];


$stmt2 = $conn->prepare("SELECT id FROM item_list where list_id = '$last_id'");
$result = $stmt2->execute();

$ids = array();
while ($row_ids = $stmt2->fetch(PDO::FETCH_ASSOC))
    $ids[] = $row_ids;

foreach ($ids as $id) {
    echo "Id: {$id[id]}<br />";
}


/*foreach ($result as $val)
    array_push($ids,$val['id']);*/

/*
if(sizeof($ids)>0)
{
    for($i=0;$i<sizeof($old);$i++)
    {
        $stmt = $conn->prepare("UPDATE item_list SET item_order = '$old[$i]' WHERE id = '$ids[$i]'");
        $result = $stmt->execute();
    }
}
*/


