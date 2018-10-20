<?php


class itemList
{

    private $id;


    private $title;


    private $description;


    private $dataType;


    private $required;


    private $hidden;


    private $creationDate;


    private $delDate;




    public function getId()
    {
        return $this->id;
    }


    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }


    public function getDataType()
    {
        return $this->dataType;
    }


    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }


    public function getRequired()
    {
        return $this->required;
    }


    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }


    public function getHidden()
    {
        return $this->hidden;
    }


    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }


    public function getCreationDate()
    {
        return $this->creationDate;
    }


    public function setDelDate($delDate)
    {
        $this->delDate = $delDate;

        return $this;
    }


    public function getDelDate()
    {
        return $this->delDate;
    }


}

