<?php


class User
{

    private $id;


    private $name;


    private $email;


    private $password;


    private $ipAdress;

   



    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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

