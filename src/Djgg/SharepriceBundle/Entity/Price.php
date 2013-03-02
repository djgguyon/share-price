<?php

namespace Djgg\SharepriceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Djgg\SharepriceBundle\Entity\Price
 *
 * @ORM\Table(name="djgg_shareprice_price")
 * @ORM\Entity(repositoryClass="Djgg\SharepriceBundle\Entity\Repository\PriceRepository")
 */
class Price {
	
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @ORM\ManyToOne(targetEntity="Djgg\SharepriceBundle\Entity\Product", inversedBy="prices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;
    
    /**
     * @ORM\ManyToOne(targetEntity="Djgg\SharepriceBundle\Entity\Society", inversedBy="prices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $society;
    
    /**
     * @var float $price
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var datetime $date
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
    	$this->date = new \Datetime();
    	//$this->user = $this->container->get('security.context')->getToken()->getUser(); 
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
     * Set price
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set date
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     * @param Djgg\UserBundle\Entity\User $user
     */
    public function setUser(\Djgg\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     * @return Djgg\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set product
     * @param Djgg\SharepriceBundle\Entity\Product $product
     * @return Price
     */
    public function setProduct(\Djgg\SharepriceBundle\Entity\Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * Get product
     * @return Djgg\SharepriceBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set society
     * @param Djgg\SharepriceBundle\Entity\Society $society
     * @return Price
     */
    public function setSociety(\Djgg\SharepriceBundle\Entity\Society $society)
    {
        $this->society = $society;
        return $this;
    }

    /**
     * Get society
     * @return Djgg\SharepriceBundle\Entity\Society 
     */
    public function getSociety()
    {
        return $this->society;
    }
}