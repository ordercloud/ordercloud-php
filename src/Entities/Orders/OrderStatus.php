<?php namespace Ordercloud\Entities\Orders;

class OrderStatus
{
    const STATUS_NEW = 1;
    const STATUS_PENDING = 2;
    const STATUS_ACCEPTED = 3;
    const STATUS_CANCELLED = 4;
    const STATUS_READY = 5;
    const STATUS_COLLECTED = 6;
    const STATUS_DELIVERED = 7;
    const STATUS_COMPLETED = 8;
    const STATUS_REJECTED = 9;
    const STATUS_FLAGGED = 10;
    const STATUS_REPLACED = 11;
    const STATUS_PICKED_UP = 12;

    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;

    public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
