<?php
/**
 * Created by PhpStorm.
 * User: AitAl
 * Date: 21/10/2018
 * Time: 19:04
 */

require_once '..\Entities\User.php';
require_once '..\Database\ConnectionInstance.php';

class Users
{
    public $pdo = null;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function SignIn($Email,$MotPasse)
    {
        $pdostate = $this->pdo->query("SELECT * FROM USER WHERE EMAIL ='$Email' and PASSWORD = '$MotPasse' LIMIT 1")->fetchObject('User');

        // get and return user
        if($pdostate == false)
            return 'ERR';
        else
        {
            $temp = array(
              'id'=>$pdostate->getId(),
              'name'=>$pdostate->getName(),
              'email'=>$pdostate->getEmail()
            );
            $_SESSION["user"] = $temp;
            return 'pass';
        }
    }
}

