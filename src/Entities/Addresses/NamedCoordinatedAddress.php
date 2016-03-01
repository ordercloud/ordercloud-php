<?php namespace Ordercloud\Entities\Addresses;

use JsonSerializable;

class NamedCoordinatedAddress extends Address implements JsonSerializable
{
    /**
     * @var GeoCoordinates
     */
    private $coordinates;
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $streetNumber
     * @param string $streetName
     * @param string $complex
     * @param string $suburb
     * @param string $city
     * @param string $postalCode
     * @param string $name
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct($streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $name, $latitude, $longitude)
    {
        parent::__construct($streetNumber, $streetName, $complex, $suburb, $city, $postalCode);
        $this->coordinates = new GeoCoordinates($latitude, $longitude);
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return GeoCoordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->coordinates->getLatitude();
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->coordinates->getLongitude();
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['name'] = $this->getName();
        $json['latitude'] = $this->getCoordinates()->getLatitude();
        $json['longitude'] = $this->getCoordinates()->getLongitude();

        return $json;
    }
}
