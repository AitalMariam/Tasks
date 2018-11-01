<?php
include "Database/Connection.php";

    // CREATE NEW ACCOUNT
    if (isset($_POST['sign_up'])){
        $Email = $_POST['txt_email'];
        // check email if exists
        function checkemail($Email,$connection){
            $query = "select count(*) from user where email = '$Email'";
            $result = $connection->prepare($query);
            $result->execute();
            $number_of_rows = $result->fetchColumn();
            return $number_of_rows;
        }

      if(checkemail($Email,$conn) == 0){
          $FullName = $_POST['txt_fullname'];
          $Password = $_POST['txt_password'];
          $Role = $_POST['role'];
          $query = "INSERT INTO USER (name, email, password,role) VALUES ('$FullName','$Email','$Password','$Role')";
          $conn->exec($query);
          header('Location: ../index.php?created=true');
      }else
          header('Location: ../index.php?created=false');
    }
    //END CREATE NEW ACCOUNT

    // Log in
    if (isset($_POST['sign_in'])){
        $Email = $_POST['email_in'];
        $Password = $_POST['password_in'];

        $result = $conn->prepare("select id,role from user where email ='".$Email."' and password = '".$Password."' LIMIT 1");
        $result->execute();
        var_dump($result->rowCount());
        if($result->rowCount() == 1)
        {
            $user = $result->fetch();
            session_start();
            //$id = $result->fetchColumn();
            $id = $user['id'];
            $_SESSION['user_id'] = $id;
            if($user['role'] == 'user')
                header('Location: ../home.php');
            if($user['role'] == 'admin')
                header('Location: adminData.php');
        }
        else
            header('Location: ../index.php?failed=true');

    }
    //End Log in

