<?php namespace Ordercloud\Delivery;

class DeliveryAgentStatus
{
    /** @var integer */
    private $id;
    /** @var string */
    private $status;

    function __construct($id, $status)
    {
        $this->id = $id;
        $this->status = $status;
    }
}
