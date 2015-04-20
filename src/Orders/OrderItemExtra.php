<?php namespace Ordercloud\Orders;

use Ordercloud\Products\ProductExtraDisplay;

class OrderItemExtra
{
    /** @var long */
    private $id;
    /** @var float */
    private $price;
    /** @var ProductExtraDisplay */
    private $extra;

    function __construct($id, $price, ProductExtraDisplay $extra)
    {
        $this->id = $id;
        $this->price = $price;
        $this->extra = $extra;
    }
}
