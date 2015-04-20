<?php namespace Ordercloud\Products;

class ProductImage
{
    /** @var string */
    private $name;
    /** @var string */
    private $thumbnail;

    function __construct($name, $thumbnail)
    {
        $this->name = $name;
        $this->thumbnail = $thumbnail;
    }
}
