<?php namespace Ordercloud\Entities\Organisations;

use Ordercloud\Entities\Delivery\Address;

class OrganisationAddress extends Address
{
    /** @var string */
    private $description;
    /** @var int */
    private $distance;

    public function __construct($id, $longitude, $latitude, $name, $description, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $distance)
    {
        parent::__construct(
            $id,
            $longitude,
            $latitude,
            $name,
            $streetNumber,
            $streetName,
            $complex,
            $suburb,
            $city,
            $postalCode
        );
        $this->distance = $distance;
        $this->description = $description;
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
