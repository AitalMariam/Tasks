<?php
/**
 * Created by PhpStorm.
 * User: AitAl
 * Date: 21/10/2018
 * Time: 19:03
 */

require $_SERVER['DOCUMENT_ROOT'].'CheckList\Model\Operations\Users.php';

session_start();
if(isset($_GET['signinBtn']))
{
    echo $_GET['email'].' '.$_GET['password'];
    //$user = $operations->SignIn($_GET['email'],$_GET['password']);
    /**if(!empty($user))
    {
        $_SESSION["ConnectedUser"] = $user;
        // get lists .. etc

        // redirect to home
        header('Location: home.php');
    }**/

}
else
    echo 'no';

