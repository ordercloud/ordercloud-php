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

    function __construct($id, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $note, $latitude, $longitude)
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
}
