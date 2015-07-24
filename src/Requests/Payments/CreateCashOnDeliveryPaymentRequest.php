<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Support\CommandBus\Command;

class CreateCashOnDeliveryPaymentRequest implements Command
{
    /**
     * @var int
     */
    private $orderId;
    /**
     * @var float
     */
    private $amount;

    /**
     * @param int   $orderId
     * @param float $amount
     */
    public function __construct($orderId, $amount) //TODO: there might be more options
    {
        $this->orderId = $orderId;
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
