<?php namespace Ordercloud\Requests\Users\Entities;

use Ordercloud\Entities\Delivery\AbstractAddress;

class NewUserAddress extends AbstractAddress
{
    public function __construct($name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode, $note, $latitude, $longitude)
    {
        parent::__construct($longitude, $latitude, $name, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode);
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}
