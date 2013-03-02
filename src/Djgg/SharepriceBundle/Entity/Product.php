<?php

namespace Djgg\SharepriceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Djgg\SharepriceBundle\Entity\Product
 *
 * @ORM\Table(name="djgg_shareprice_product")
 * @ORM\Entity(repositoryClass="Djgg\SharepriceBundle\Entity\Repository\ProductRepository")
 */
class Product {
	
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Djgg\SharepriceBundle\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Djgg\SharepriceBundle\Entity\Price", mappedBy="product")
     */
    private $prices;
    
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;


    public function __construct()
    {
    	$this->prices = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->name;
    }

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Add prices
     * @param Djgg\SharepriceBundle\Entity\Price $prices
     * @return Product
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
     * Set category
     * @param Djgg\SharepriceBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Djgg\SharepriceBundle\Entity\Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     * @return Djgg\SharepriceBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}