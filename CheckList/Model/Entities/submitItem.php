<?php



class submitItem
{

    private $id;


    private $submit;
	
	

    private $itemListId;
	
	

    private $userId;


    private $ipAdress;

    /**
     * @return mixed
     */
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
    public function getItemListId()
    {
        return $this->itemListId;
    }

    /**
     * @param mixed $itemListId
     */
    public function setItemListId($itemListId)
    {
        $this->itemListId = $itemListId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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

