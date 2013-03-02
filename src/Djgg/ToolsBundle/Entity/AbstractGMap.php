<?php
namespace Djgg\ToolsBundle\Entity;

use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Djgg\ToolsBundle\Entity\AbstractGMap
 * @ORM\MappedSuperclass
 */
abstract class AbstractGMap
{
	
	/**
	 * @var string
	 * @ORM\Column(name="address", type="string", length=255, nullable=true)
	 */
	protected $address;

	/**
	 * @var string
	 * @ORM\Column(name="locality", type="string", length=255, nullable=true)
	 */
	protected $locality;

	/**
	 * @var string
	 * @ORM\Column(name="country", type="string", length=255, nullable=true)
	 */
	protected $country;

	/**
	 * @var string
	 * @ORM\Column(name="administrative_area_level_2", type="string", length=255, nullable=true)
	 */
	protected $administrativeAreaLevel2;

	/**
	 * @var string
	 * @ORM\Column(name="administrative_area_level_1", type="string", length=255, nullable=true)
	 */
	protected $administrativeAreaLevel1;

	/**
	 * @var string
	 * @ORM\Column(name="postal_code", type="string", length=50, nullable=true)
	 */
	protected $postalCode;
	
	/**
	 * @var float $lat
	 * @ORM\Column(name="lat", type="float", nullable=true)
	 */
	protected $lat;

	/**
	 * @var float $lng
	 * @ORM\Column(name="lng", type="float", nullable=true)
	 */
	protected $lng;

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function setLocality($locality)
	{
		$this->locality = $locality;
	}

	public function getLocality()
	{
		return $this->locality;
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function setAdministrativeAreaLevel2($administrativeAreaLevel2)
	{
		$this->administrativeAreaLevel2 = $administrativeAreaLevel2;
	}
	
	public function getAdministrativeAreaLevel2()
	{
		return $this->administrativeAreaLevel2;
	}

	public function setAdministrativeAreaLevel1($administrativeAreaLevel1)
	{
		$this->administrativeAreaLevel1 = $administrativeAreaLevel1;
	}
	
	public function getAdministrativeAreaLevel1()
	{
		return $this->administrativeAreaLevel1;
	}

	public function setPostalCode($postalCode)
	{
		$this->postalCode = $postalCode;
	}
	
	public function getPostalCode()
	{
		return $this->postalCode;
	}
	
	
	public function getLat()
	{
		return $this->lat;
	}

	public function setLat($lat)
	{
		//if (is_string($lat)) {
			//$lat = floatval($lat);
		//}
		
		$this->lat = (float) $lat;
	}

	public function getLng()
	{
		return $this->lng;
	}

	public function setLng($lng)
	{
		//if (is_string($lng)) {
			//$lng = floatval($lng);
		//}
		$this->lng = (float) $lng;
	}
}