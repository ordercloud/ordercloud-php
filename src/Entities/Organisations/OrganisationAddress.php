<?php namespace Ordercloud\Entities\Organisations;

use Ordercloud\Entities\Delivery\AbstractAddress;

class OrganisationAddress extends AbstractAddress
{
    /** @var int */
    private $id;
    /** @var int */
    private $distance;

    // TODO: UserAddress & Organisation address are now the same - refactor

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
