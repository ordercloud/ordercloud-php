<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Products\ProductOptionDisplay;

class OrderItemOption implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var float */
    private $price;
    /** @var ProductOptionDisplay */
    private $option;

    public function __construct($id, $price, ProductOptionDisplay $option)
    {
        $this->id = $id;
        $this->price = $price;
        $this->option = $option;
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
     * @return ProductOptionDisplay
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'price' => $this->getPrice(),
            'option' => $this->getOption(),
        ];
    }
}
