<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Addresses\Address;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GeocodeAddressRequest
 *
 * @see Ordercloud\Requests\Users\Handlers\GeocodeAddressRequestHandler
 */
class GeocodeAddressRequest implements Command
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
