<?php

class submitItem
{

    private $id;


    private $submit;
	

    private $itemList;
	
	

    private $user;

    private $ipAdress;



    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSubmit()
    {
        return $this->submit;
    }

    /**
     * @param mixed $submit
     */
    public function setSubmit($submit)
    {
        $this->submit = $submit;
    }

    /**
     * @return mixed
     */
    public function getItemList()
    {
        return $this->itemList;
    }

    /**
     * @param mixed $itemList
     */
    public function setItemList($itemList)
    {
        $this->itemList = $itemList;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getIpAdress()
    {
        return $this->ipAdress;
    }

    /**
     * @param mixed $ipAdress
     */
    public function setIpAdress($ipAdress)
    {
        $this->ipAdress = $ipAdress;
    }



}
