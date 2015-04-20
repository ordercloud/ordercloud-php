<?php namespace Ordercloud\Orders;

use Ordercloud\Products\ProductOptionDisplay;

class OrderItemOption
{
    /** @var long */
    private $id;
    /** @var float */
    private $price;
    /** @var ProductOptionDisplay */
    private $option;

    function __construct($id, $price, ProductOptionDisplay $option)
    {
        $this->id = $id;
        $this->price = $price;
        $this->option = $option;
    }
}
