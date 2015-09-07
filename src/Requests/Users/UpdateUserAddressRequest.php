<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Support\CommandBus\Command;

class UpdateUserAddressRequest implements Command
{
    /** @var UserAddress */
    private $address;

    /**
     * @param UserAddress $address
     */
    public function __construct(UserAddress $address)
    {
        $this->address = $address;
    }

    /**
     * @return UserAddress
     */
    public function getAddress()
    {
        return $this->address;
    }
}
