<?php

namespace Djgg\SharepriceBundle\Entity;

use Djgg\ToolsBundle\Entity\AbstractGMap;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Djgg\SharepriceBundle\Entity\Society
 *
 * @ORM\Table(name="djgg_shareprice_society")
 * @ORM\Entity(repositoryClass="Djgg\SharepriceBundle\Entity\Repository\SocietyRepository")
 */
class Society extends AbstractGMap
{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;
    
	/**
     * @var string $tel
     * @ORM\Column(name="tel", type="string", length=14, nullable=false)
     * @Assert\NotBlank()
     * Assert\Regex(pattern="ˆ0[0-68]([-. ]?[0-9]{2}){4}$", match=true, message="Not a valid number")
     */
    private $tel;
	
	/**
     * @var string $fax
     * @ORM\Column(name="fax", type="string", length=14, nullable=true)
     * Assert\Regex(pattern=" ˆ0[0-68]([-. ]?[0-9]{2}){4}$", match=true, message="Not a valid number")
     */
    private $fax;
    
    /**
     * 
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * 
     * @ORM\Column(name="contact", type="string", length=100, nullable=true)
     */
    private $contact;
    
    /**
     * @ORM\OneToMany(targetEntity="Djgg\SharepriceBundle\Entity\Price", mappedBy="society")
     */
    private $prices;
    
    /**
     * @ORM\OneToMany(targetEntity="Djgg\UserBundle\Entity\User", mappedBy="society")
     */
    private $users;
    
    /**
     * @ORM\ManyToOne(targetEntity="Djgg\SharepriceBundle\Entity\Group", inversedBy="societies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $group;
    
    /**
     * Get id
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     * @return Society
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set tel
     * @param string $tel
     * @return Society
     */
    public function setTel($tel)
    {
    	$this->tel = $tel;
    	return $this;
    }
    
    /**
     * Get tel
     * @return string
     */
    public function getTel()
    {
    	return $this->tel;
    }
    
    /**
     * Set fax
     * @param string $fax
     * @return Society
     */
    public function setFax($fax)
    {
    	$this->fax = $fax;
    	return $this;
    }
    
    /**
     * Get fax
     * @return string
     */
    public function getFax()
    {
    	return $this->fax;
    }
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->getNom();
    }
    
    /**
     * Add prices
     *
     * @param Djgg\SharepriceBundle\Entity\Price $prices
     * @return Society
     */
    public function addPrice(\Djgg\SharepriceBundle\Entity\Price $prices)
    {
        $this->prices[] = $prices;
        return $this;
    }

    /**
     * Remove prices
     * @param Djgg\SharepriceBundle\Entity\Price $prices
     */
    public function removePrice(\Djgg\SharepriceBundle\Entity\Price $prices)
    {
        $this->prices->removeElement($prices);
    }

    /**
     * Get prices
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Add users
     * @param Djgg\UserBundle\Entity\User $users
     * @return Society
     */
    public function addUser(\Djgg\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
        return $this;
    }

    /**
     * Remove users
     * @param Djgg\UserBundle\Entity\User $users
     */
    public function removeUser(\Djgg\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    /**
     * Set description
     * @param string $description
     * @return Society
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set contact
     * @param string $contact
     * @return Society
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Get contact
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set group
     * @param Djgg\SharepriceBundle\Entity\Group $group
     * @return Society
     */
    public function setGroup(\Djgg\SharepriceBundle\Entity\Group $group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Get group
     * @return Djgg\SharepriceBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}