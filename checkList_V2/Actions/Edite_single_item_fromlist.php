<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];
$listId =  $_GET['id'];
