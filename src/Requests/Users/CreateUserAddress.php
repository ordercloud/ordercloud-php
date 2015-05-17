<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Requests\Users\Entities\NewUserAddress;
use Ordercloud\Support\CommandBus\Command;

class CreateUserAddress implements Command
{
    /** @var int */
    private $userID;
    /** @var NewUserAddress */
    private $address;
    /** @var string|null */
    private $accessToken;

    public function __construct($userID, NewUserAddress $address, $accessToken = null)
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
     * @return NewUserAddress
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
