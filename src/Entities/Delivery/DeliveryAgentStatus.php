<?php namespace Ordercloud\Entities\Delivery;

class DeliveryAgentStatus
{
    /** @var integer */
    private $id;
    /** @var string */
    private $status;

    public function __construct($id, $status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
