<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

class GetOrderRequest implements Command
{
    /** @var int */
    private $orderID;

    /**
     * @param int         $orderID
     * @param string|null $accessToken
     */
    public function __construct($orderID)
    {
        $this->orderID = $orderID;
    }

    /**
     * @return int
     */
    public function getOrderID()
    {
        return $this->orderID;
    }
}
