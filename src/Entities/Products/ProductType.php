<?php namespace Ordercloud\Entities\Products;

class ProductType
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;

    function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}