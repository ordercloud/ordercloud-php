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

    public function __construct($id, $price, ProductExtraDisplay $extra)
    {
        $this->id = $id;
        $this->price = $price;
        $this->extra = $extra;
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
     * @return ProductExtraDisplay
     */
    public function getExtra()
    {
        return $this->extra;
    }
}
