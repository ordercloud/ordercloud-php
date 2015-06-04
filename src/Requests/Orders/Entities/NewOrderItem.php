<?php namespace Ordercloud\Requests\Orders\Entities;

class NewOrderItem
{
    /** @var int */
    private $productID;
    /** @var float */
    private $price;
    /** @var int */
    private $quantity;
    /** @var string */
    private $note;
    /** @var array|NewOrderItemOption[] */
    private $options;
    /** @var array|NewOrderItemExtra[] */
    private $extras;

    public function __construct($productID, $price, $quantity, $note = null, array $options = [], array $extras = [])
    {
        $this->productID = $productID;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->note = $note;
        $this->options = $options;
        $this->extras = $extras;
    }

    /**
     * @return int
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return array|NewOrderItemOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return array|NewOrderItemExtra[]
     */
    public function getExtras()
    {
        return $this->extras;
    }
}
