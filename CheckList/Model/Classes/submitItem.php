<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * submitItem
 *
 * @ORM\Table(name="submit_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\submitItemRepository")
 */
class submitItem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="submit", type="text")
     */
    private $submit;
	
	
	/**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\itemList")
     * @ORM\JoinColumn(nullable=false)
     */
    private $itemList;
	
	
	/**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set submit
     *
     * @param string $submit
     *
     * @return submitItem
     */
    public function setSubmit($submit)
    {
        $this->submit = $submit;

        return $this;
    }

    /**
     * Get submit
     *
     * @return string
     */
    public function getSubmit()
    {
        return $this->submit;
    }
}

