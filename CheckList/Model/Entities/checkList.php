<?php


class checkList
{

    private $id;


    private $title;


    private $creationDate;



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


    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }


    public function getCreationDate()
    {
        return $this->creationDate;
    }
}

