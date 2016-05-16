<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

class FindOrdersRequest implements Command
{
    /**
     * @var string
     */
    private $orderReference;

    /**
     * @param $orderReference
     */
    public function __construct($orderReference)
    {
        $this->orderReference = $orderReference;
    }

    /**
     * @return string
     */
    public function getOrderReference()
    {
        return $this->orderReference;
    }
}
