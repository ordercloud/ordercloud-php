<?php namespace Ordercloud\Entities\Products;

class ProductExtraDisplay
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var float */
    private $price;
    /** @var array|ProductTag[] */
    private $tags;

    function __construct($id, $name, $description, $price, array $tags)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->tags = $tags;
    }
}
