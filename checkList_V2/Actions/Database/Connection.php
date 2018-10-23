<?php
$server_name = 'localhost';
$user_name = 'root';
$password ='';
try{
    $conn = new PDO("mysql:host=$server_name;dbname=checklist",$user_name,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception){
    $err = $exception->getMessage();
    echo "<script> alert('Connection failed:')</script>";
}
?>