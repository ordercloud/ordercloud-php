<?php namespace Ordercloud\Entities\Organisations;

use Ordercloud\Entities\Delivery\AbstractAddress;

class OrganisationAddress extends AbstractAddress
{
    /** @var int */
    private $id;
    /** @var int */
    private $distance;

    public function __construct($id, $distance, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        parent::__construct($longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode);
        $this->id = $id;
        $this->distance = $distance;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }
}
