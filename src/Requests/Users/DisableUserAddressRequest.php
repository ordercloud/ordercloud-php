<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class DisableUserAddressRequest implements Command
{
    /**
     * @var int
     */
    private $addressId;

    /**
     * @param int $addressId
     */
    public function __construct($addressId)
    {
        $this->addressId = $addressId;
    }

    /**
     * @return int
     */
    public function getAddressId()
    {
        return $this->addressId;
    }
}
