<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetUserAddressByIdRequest
 *
 * @see Ordercloud\Requests\Users\Handlers\GetUserAddressByIdRequestHandler
 */
class GetUserAddressByIdRequest implements Command
{
    /** @var int */
    protected $addressId;

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
