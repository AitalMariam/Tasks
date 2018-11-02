<?php
session_start();
include "Database/Connection.php";
$USER_ID = $_SESSION['user_id'];


$result = $_GET['result'];
for($i=0;$i<sizeof($result);$i++)
{
    $val = $result[$i];
    $query = "INSERT INTO item_answer (answer, item_id, user_id) VALUES ('$val[0]',$val[1],'$USER_ID')";
    $conn->exec($query);
}

$listid = $_GET['listid'];
$ip = get_client_ip();
$currentdate = date_default_timezone_get();
$query2 = "INSERT INTO submit_item (list_id, user_id, ipAdress) VALUES ('$listid','$USER_ID','$ip')";
$conn->exec($query2);

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';


    return $ipaddress;
}

header('Location: ../home.php');