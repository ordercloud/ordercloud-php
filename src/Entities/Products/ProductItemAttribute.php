<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductItemsProductAttribute implements JsonSerializable
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
    public function __construct($id, $product, $value, $attribute)
    {
        $this->id = $id;
        $this->product = $product;
        $this->value = $value;
        $this->attribute = $attribute;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return ProductAttribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *        which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'product' => $this->getProduct(),
            'value' => $this->getValue(),
            'attribute' => $this->getAttribute(),
        ];
    }
}
