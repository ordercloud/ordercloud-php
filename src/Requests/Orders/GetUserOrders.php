<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

class GetUserOrders implements Command
{
    /** @var int */
    protected $userID;
    /** @var string|null */
    protected $accessToken;

    function __construct($userID, $accessToken = null)
    {
        $this->userID = $userID;
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
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
