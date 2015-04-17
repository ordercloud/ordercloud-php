<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\Organisation;

class ProductTag
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $shortDescription;
    /** @var boolean */
    private $enabled;
    /** @var array|ProductExtra[] */
    private $extras;
    /** @var ProductTag */
    private $parentTag;
    /** @var array|ProductTagLink[] */
    private $childTags;
    /** @var array|ProductOption[] */
    private $options;
    /** @var array|ProductAttribute[] */
    private $attributes;
    /** @var array|Product[] */
    private $products;
    /** @var ProductTagType */
    private $type;
    /** @var Organisation */
    private $organisation;

}
