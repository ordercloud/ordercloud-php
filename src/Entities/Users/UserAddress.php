<?php namespace Ordercloud\Entities\Users;

class UserAddress
{
    /** @var integer */
    private $id;
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
    /** @var string */
    private $note;
    /** @var string */
    private $latitude;
    /** @var string */
    private $longitude;

    public function __construct($id, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $note, $latitude, $longitude)
    {
        $this->id = $id;
        $this->name = $name;
        $this->streetNumber = $streetNumber;
        $this->streetName = $streetName;
        $this->complex = $complex;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->note = $note;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
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

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
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
    public function getLongitude()
    {
        return $this->longitude;
    }
}
