<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class GetUserAddressesRequest implements Command
{
    /** @var int */
    protected $userID;

    public function __construct($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }
}
