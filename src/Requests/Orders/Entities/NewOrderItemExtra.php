<?php namespace Ordercloud\Requests\Orders\Entities;

class NewOrderItemExtra
{
    /** @var int */
    private $id;
    /** @var float */
    private $price;
    /** @var string */
    private $name;

    public function __construct($id = null, $price, $name = null)
    {
        $this->id = $id;
        $this->price = $price;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
