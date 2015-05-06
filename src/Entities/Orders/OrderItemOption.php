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

    function __construct($id, $price, ProductOptionDisplay $option)
    {
        $this->id = $id;
        $this->price = $price;
        $this->option = $option;
    }
}
