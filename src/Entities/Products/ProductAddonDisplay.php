<?php namespace Ordercloud\Entities\Products;

class ProductAddonDisplay extends AbstractProductAddon
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
}
