<?php namespace Ordercloud\Entities\Organisations;

use Ordercloud\Entities\Delivery\AbstractAddress;

class OrganisationAddress extends AbstractAddress
{
    /** @var int */
    private $id;
    /** @var string */
    private $description;
    /** @var int */
    private $distance;

    public function __construct($id, $description, $distance, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        parent::__construct($longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode);
        $this->id = $id;
        $this->distance = $distance;
        $this->description = $description;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }
}
