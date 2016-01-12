<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetPaymentThreeDSecureRequest
 *
 * @see Ordercloud\Requests\Payments\Handlers\GetPaymentThreeDSecureRequestHandler
 */
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
