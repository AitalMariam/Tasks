<?php
/**
 * Created by PhpStorm.
 * User: AitAl
 * Date: 21/10/2018
 * Time: 19:04
 */


require $_SERVER['DOCUMENT_ROOT'].'CheckList\Model\Entities\User.php';
require $_SERVER['DOCUMENT_ROOT'].'CheckList\Model\DataBase\ConnectionInstance.php.php';
class Users
{
    public $pdo = null;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function SignIn($Email,$MotPasse)
    {
        $pdostate = $this->pdo->query("SELECT * FROM USER WHERE EMAIL ='$Email' and PASSWORD = '$MotPasse' ");
        $pdostate->execute();
        // get and return user
    }
}