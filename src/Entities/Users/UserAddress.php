<?php namespace Ordercloud\Entities\Users;

class UserAddress extends NewUserAddress
{
    /**
     * @var int
     */
    private $id;

    public function __construct($id, $note, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        parent::__construct($name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $note, $latitude, $longitude);
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
