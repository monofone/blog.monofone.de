<?php

namespace Blage\BlogBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The Author of an Blog Article
 *
 * @ORM\Entity
 * @ORM\Table()
 */
class Author extends \FOS\UserBundle\Entity\User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string",length=100)
     */
    protected $firstName="";
    
    /**
     * @ORM\Column(type="string",length=100)
     */
    protected $lastName="";
    
    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author")
     */
    protected $articles;
    

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        parent::__construct();
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

}
