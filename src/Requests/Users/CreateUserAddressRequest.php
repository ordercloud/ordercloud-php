<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Requests\Users\Entities\NewUserAddress;
use Ordercloud\Support\CommandBus\Command;

class CreateUserAddressRequest implements Command
{
    /** @var int */
    private $userID;
    /** @var NewUserAddress */
    private $address;

    /**
     * @param int            $userID
     * @param NewUserAddress $address
     */
    public function __construct($userID, NewUserAddress $address)
    {
        $this->userID = $userID;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return NewUserAddress
     */
    public function getAddress()
    {
        return $this->address;
    }
}
