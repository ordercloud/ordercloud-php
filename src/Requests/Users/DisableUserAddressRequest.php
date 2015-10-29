<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class DisableUserAddressRequest
 *
 * @see Ordercloud\Requests\Users\Handlers\DisableUserAddressRequestHandler
 */
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
