<?php namespace Ordercloud\Entities\Delivery;

abstract class AbstractAddress
{
    /** @var string */
    private $longitude;
    /** @var string */
    private $latitude;
    /** @var string */
    private $name;
    /** @var string */
    private $streetNumber;
    /** @var string */
    private $streetName;
    /** @var string */
    private $complex;
    /** @var string */
    private $suburb;
    /** @var string */
    private $city;
    /** @var string */
    private $postalCode;

    public function __construct($longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->name = $name;
        $this->streetNumber = $streetNumber;
        $this->streetName = $streetName;
        $this->complex = $complex;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return string
     */
    public function getComplex()
    {
        return $this->complex;
    }

    /**
     * @return string
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
}
