<?php namespace Ordercloud\Entities\Organisations;

use JsonSerializable;
use Ordercloud\Entities\Addresses\NamedCoordinatedAddress;

class OrganisationAddress extends NamedCoordinatedAddress implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $province;
    /**
     * @var string
     */
    private $country;

    /**
     * @param int    $id
     * @param string $longitude
     * @param string $latitude
     * @param string $name
     * @param string $streetNumber
     * @param string $streetName
     * @param string $complex
     * @param string $suburb
     * @param string $city
     * @param string $postalCode
     * @param string $province
     * @param string $country
     */
    public function __construct($id, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $province, $country)
    {
        parent::__construct(
            $streetNumber,
            $streetName,
            $complex,
            $suburb,
            $city,
            $postalCode,
            $name,
            $latitude,
            $longitude
        );
        $this->id = $id;
        $this->province = $province;
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['id'] = $this->getId();
        $json['province'] = $this->getProvince();
        $json['country'] = $this->getCountry();

        return $json;
    }
}
