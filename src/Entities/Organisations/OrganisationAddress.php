<?php namespace Ordercloud\Entities\Organisations;

use JsonSerializable;
use Ordercloud\Entities\Addresses\NamedCoordinatedAddress;

class OrganisationAddress extends NamedCoordinatedAddress implements JsonSerializable
{
    /** @var int */
    private $id;

    /**
     * @param int    $id
     * @param string $longitude
     * @param string $latitude
     * @param string $name
     * @param string $streetNumber
     * @param string $streetName
     * @param string $complex
     * @param string $suburb
     * @param string $city
     * @param string $postalCode
     */
    public function __construct($id, $longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        parent::__construct(
            $streetNumber,
            $streetName,
            $complex,
            $suburb,
            $city,
            $postalCode,
            $name,
            $latitude,
            $longitude
        );
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
    function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['id'] = $this->getId();

        return $json;
    }
}
