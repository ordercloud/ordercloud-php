<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetPaymentRequest
 *
 * @see Ordercloud\Requests\Payments\Handlers\GetPaymentRequestHandler
 */
class GetPaymentRequest implements Command
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
