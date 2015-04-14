<?php namespace Ordercloud\Products;

class ProductTagLink
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var array|ProductOption[] */
    private $options;
    /** @var array|ProductExtra[] */
    private $extras;
    /** @var array|ProductAttribute[] */
    private $attributes;
}
