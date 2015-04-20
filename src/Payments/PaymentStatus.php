<?php namespace Ordercloud\Payments;

class PaymentStatus
{
    /** @var string */
    private $status;
    /** @var string */
    private $when;
    /** @var string */
    private $message;

    function __construct($status, $when, $message)
    {
        $this->status = $status;
        $this->when = $when;
        $this->message = $message;
    }
}
