<?php
namespace Djgg\SharepriceBundle\Entity;

use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Djgg\SharepriceBundle\Entity\Category
 *
 * @ORM\Table(name="djgg_shareprice_category")
 * @ORM\Entity(repositoryClass="Djgg\SharepriceBundle\Entity\Repository\CategoryRepository")
 */
class Category {
	
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(title="ID")
     */
    private $id;

    /**
     * @var integer $parentId
     */
    private $parentId;
    
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="Djgg\SharepriceBundle\Entity\Product", mappedBy="category")
     */
    private $products;
    
    public function __construct() {
    }
    
    public function __toString() {
    	return $this->name;
    }

    /**
     * Get id
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name
     * @return string 
     */
    public function getName() {
        return $this->name;
    }


    /**
     * Add products
     * @param Djgg\SharepriceBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Djgg\SharepriceBundle\Entity\Product $products) {
        $this->products[] = $products;
        return $this;
    }

    /**
     * Remove products
     * @param Dg\MercurialeBundle\Entity\Product $products
     */
    public function removeProduct(\Djgg\SharepriceBundle\Entity\Product $products) {
        $this->produits->removeElement($products);
    }

    /**
     * Get products
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProducts() {
        return $this->products;
    }
}