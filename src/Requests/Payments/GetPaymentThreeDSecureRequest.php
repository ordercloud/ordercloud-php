<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Support\CommandBus\Command;

class GetPaymentThreeDSecureRequest implements Command
{
    /**
     * @var int
     */
    private $paymentId;

    /**
     * @param int $paymentId
     */
    public function __construct($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }
}
