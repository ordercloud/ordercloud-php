<?php namespace Ordercloud\Entities\Products;

class ProductItemsProductAttribute
{
    /** @var int */
    private $id;
    /** @var Product */
    private $product;
    /** @var string */
    private $value;
    /** @var ProductAttribute */
    private $attribute;

    /**
     * @param int              $id
     * @param Product          $product
     * @param string           $value
     * @param ProductAttribute $attribute
     */
    function __construct($id, $product, $value, $attribute)
    {
        $this->id = $id;
        $this->product = $product;
        $this->value = $value;
        $this->attribute = $attribute;
    }
}
