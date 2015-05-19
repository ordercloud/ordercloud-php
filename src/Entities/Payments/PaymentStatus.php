<?php namespace Ordercloud\Entities\Payments;

class PaymentStatus
{
    const UNPAID = 'UNPAID';
    const PARTLY_PAID = 'PARTLY_PAID';
    const DEPOSIT_PAID = 'DEPOSIT_PAID';
    const PAID = 'PAID';
    const ACCOUNT = 'ACCOUNT';

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

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
