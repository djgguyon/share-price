<?php

namespace Djgg\SharepriceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Djgg\SharepriceBundle\Entity\Group
 *
 * @ORM\Table(name="djgg_shareprice_group")
 * @ORM\Entity(repositoryClass="Djgg\SharepriceBundle\Entity\Repository\GroupRepository")
 */
class Group {
	
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
     * @var text $description
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="Djgg\SharepriceBundle\Entity\Society", mappedBy="group")
     */
    private $societies;
    
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
     * Constructor
     */
    public function __construct()
    {
    }
    
    public function __toString()
    {
    	return $this->getName();
    }


    /**
     * Set description
     * @param string $description
     * @return Groupe
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
     * Add societies
     * @param Djgg\SharepriceBundle\Entity\Society $societies
     * @return Group
     */
    public function addSociety(\Djgg\SharepriceBundle\Entity\Society $societies)
    {
        $this->societies[] = $societies;
    
        return $this;
    }

    /**
     * Remove societies
     * @param Djgg\SharepriceBundle\Entity\Society $societies
     */
    public function removeSociety(\Djgg\SharepriceBundle\Entity\Society $societies)
    {
        $this->societies->removeElement($societies);
    }

    /**
     * Get societies
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSocieties()
    {
        return $this->societies;
    }
}