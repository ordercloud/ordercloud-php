<?php namespace Ordercloud\Entities\Addresses;

class NamedCoordinatedAddress extends Address
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
}
