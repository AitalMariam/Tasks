<?php



require_once '..\Operations\Users.php';

session_start();
if(isset($_POST['signinBtn']))
{

    $operations = new Users();
    $user = $operations->SignIn($_POST['email'],$_POST['password']);

    if($user == 'ERR')
        header('Location: ..\View\index.php');
    else
        header('Location: ..\View\home.php');
}
else
    header('Location: ..\View\home.php');

