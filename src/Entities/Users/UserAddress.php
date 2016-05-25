<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;

class UserAddress extends NewUserAddress implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    public function __construct($id, $note, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $favourite = false)
    {
        parent::__construct($name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $note, $latitude, $longitude, $favourite);
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['id'] = $this->getId();

        return $json;
    }
}
