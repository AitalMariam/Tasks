<?php
/**
 * Created by PhpStorm.
 * User: AitAl
 * Date: 22/10/2018
 * Time: 02:12
 */


require_once '..\Entities\checkList.php';
require_once '..\Database\ConnectionInstance.php';
class CheckLists
{
    public $pdo = null;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // get all check lists
    public function getAll()
    {
        $pdostate = $this->pdo->query("SELECT * FROM CHECK_LIST ");
        $pdostate->execute();
        $lists = array();
        while (($ligne = $pdostate->fetch())!= null)
        {
            $temp = array(
              'id'=>$ligne['id'],
              'title'=>$ligne['title'],
            );
            array_push($lists,$temp);
        }

        if(sizeof($lists)>0)
            $_SESSION["lists"] = $lists;
        else
            return 'ERR';

    }
}