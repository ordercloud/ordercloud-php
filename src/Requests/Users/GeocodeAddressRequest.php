<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Delivery\AbstractAddress;
use Ordercloud\Support\CommandBus\Command;

class GeocodeAddressRequest extends AbstractAddress implements Command
{
    public function __construct($streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        parent::__construct(null, null, null, $streetNumber, $streetName, $complex, $suburb, $city, $postalCode);
    }
}
