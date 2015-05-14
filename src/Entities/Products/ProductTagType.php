<?php namespace Ordercloud\Entities\Products;

class ProductTagType
{
    /** @var integer */
    private $id;
    /** @var string */
    private $description;
    /** @var string */
    private $name;

    function __construct($id, $description, $name)
    {
        $this->id = $id;
        $this->description = $description;
        $this->name = $name;
    }
}
