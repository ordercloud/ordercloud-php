<?php namespace Ordercloud\Entities\Addresses;

use JsonSerializable;

class Address implements JsonSerializable
{
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

    /**
     * @param string $streetNumber
     * @param string $streetName
     * @param string $complex
     * @param string $suburb
     * @param string $city
     * @param string $postalCode
     */
    public function __construct($streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        $this->streetNumber = $streetNumber;
        $this->streetName = $streetName;
        $this->complex = $complex;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return string
     */
    public function getComplex()
    {
        return $this->complex;
    }

    /**
     * @return string
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Returns an array of address lines.
     *
     * @return array|string[]
     */
    public function getAddressLines()
    {
        return array_filter([
            $this->getComplex(),
            implode(' ', array_filter([$this->getStreetNumber(), $this->getStreetName()])),
            $this->getSuburb(),
            $this->getCity(),
            $this->getPostalCode()
        ]);
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'streetNumber' => $this->streetNumber,
            'streetName' => $this->streetName,
            'complex' => $this->complex,
            'suburb' => $this->suburb,
            'city' => $this->city,
            'postalCode' => $this->postalCode,
        ];
    }
}
