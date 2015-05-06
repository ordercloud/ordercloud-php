<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Products\ProductExtraDisplay;

class OrderItemExtra
{
    /** @var integer */
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
