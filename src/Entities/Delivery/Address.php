<?php namespace Ordercloud\Entities\Delivery;

class Address extends AbstractAddress
{
    /** @var int */
    private $id;

    public function __construct($id, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        parent::__construct($longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode);
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
