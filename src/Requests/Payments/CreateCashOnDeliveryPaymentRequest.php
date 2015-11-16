<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class CreateCashOnDeliveryPaymentRequest
 *
 * @see Ordercloud\Requests\Payments\Handlers\CreateCashOnDeliveryPaymentRequestHandler
 */
class CreateCashOnDeliveryPaymentRequest implements Command
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @param int   $orderId
     * @param float $amount
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
}
