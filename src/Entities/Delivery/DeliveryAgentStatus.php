<?php namespace Ordercloud\Entities\Delivery;

use JsonSerializable;

class DeliveryAgentStatus implements JsonSerializable
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

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'status' => $this->getStatus(),
        ];
    }
}
