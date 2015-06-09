<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

class GetOrderRequest implements Command
{
    /** @var int */
    private $orderID;
    /** @var string|null */
    private $accessToken;

    /**
     * @param int         $orderID
     * @param string|null $accessToken
     */
    function __construct($orderID, $accessToken = null)
    {
        $this->orderID = $orderID;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
