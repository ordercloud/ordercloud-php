<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;
use Ordercloud\Entities\Addresses\NamedCoordinatedAddress;

class NewUserAddress extends NamedCoordinatedAddress implements JsonSerializable
{
    /**
     * @var string
     */
    private $note;
    /**
     * @var bool
     */
    private $favourite;

    /**
     * @param string $name
     * @param string $streetNumber
     * @param string $streetName
     * @param string $complex
     * @param string $suburb
     * @param string $city
     * @param string $postalCode
     * @param string $note
     * @param string $latitude
     * @param string $longitude
     * @param bool   $favourite
     */
    public function __construct($name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $note, $latitude, $longitude, $favourite = false)
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
        $this->note = $note;
        $this->favourite = $favourite;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return boolean
     */
    public function isFavourite()
    {
        return $this->favourite;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['note'] = $this->getNote();
        $json['favourite'] = $this->isFavourite();

        return $json;
    }
}
