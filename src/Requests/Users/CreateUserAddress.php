<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Support\CommandBus\Command;

class CreateUserAddress implements Command
{
    /** @var int */
    private $userID;
    /** @var UserAddress */
    private $address;
    /** @var string|null */
    private $accessToken;

    public function __construct($userID, UserAddress $address, $accessToken = null)
    {
        $this->userID = $userID;
        $this->address = $address;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return UserAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
