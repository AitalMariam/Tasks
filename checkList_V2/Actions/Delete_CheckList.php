<?php
session_start();
include "Database/Connection.php";

$list_id = $_GET['list_id'];
$delete = $conn->prepare("DELETE FROM check_list WHERE id = '$list_id'");
$delete->execute();

