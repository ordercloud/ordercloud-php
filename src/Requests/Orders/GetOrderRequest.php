<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetOrderRequest
 *
 * @see Ordercloud\Requests\Orders\Handlers\GetOrderRequestHandler
 */
class GetOrderRequest implements Command
{
    /** @var int */
    private $orderID;

    /**
     * @param int         $orderID
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
