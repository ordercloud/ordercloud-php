<?php namespace Ordercloud\Entities\Payments;

abstract class AbstractPaymentStatus
{
    /** @var string */
    private $status;
    /** @var string */
    private $when;
    /** @var string */
    private $message;

    public function __construct($status, $when, $message)
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
