<?php

session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];

$positions = $_GET['position'];
for($i=0;$i<sizeof($positions);$i++)
{
    $order = $i +1 ;
    $stmt = $conn->prepare("UPDATE item_list SET item_order = '$order' WHERE id = '$positions[$i]'");
    $stmt->execute();
}
echo 'done';



