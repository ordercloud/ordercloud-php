<?php namespace Ordercloud\Entities\Products;

class ProductTagLink
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
