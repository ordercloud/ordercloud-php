<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Products\ProductOptionDisplay;

class OrderItemOption
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
}
