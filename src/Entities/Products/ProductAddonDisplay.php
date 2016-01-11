<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductAddonDisplay extends AbstractProductAddon implements JsonSerializable
{
    /**
     * @var ProductTag
     */
    private $tag;

    public function __construct($id, $name, $description, $price, ProductTag $tag = null) //TODO when api is fixed, remove the null
    {
        parent::__construct($id, $name, $description, $price);
        $this->tag = $tag;
    }

    /**
     * @return ProductTag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['tag'] = $this->getTag();

        return $json;
    }
}
