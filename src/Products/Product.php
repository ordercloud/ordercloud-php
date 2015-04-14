<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\Organisation;

class Product
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $shortDescription;
    /** @var string */
    private $sku;
    /** @var float */
    private $price;
    /** @var array|ProductItemsProductAttribute[] */
    private $attributes;
    /** @var array|ProductOption[] */
    private $options;
    /** @var array|ProductExtra[] */
    private $extras;
    /** @var array|ProductTag[] */
    private $tags;
    /** @var undefined */ //TODO
    private $customProduct;
    /** @var undefined */ //TODO
    private $libraryProduct;
    /** @var Organisation */
    private $organisation;
    /** @var boolean */
    private $enabled;
    /** @var boolean */
    private $available;
    /** @var boolean */
    private $availableOnline;
    /** @var array|ProductImage[] */
    private $images;
    /** @var array|ProductDto[] */
    private $groupItems;
    /** @var undefined */ //TODO
    private $productType;
    /** @var undefined */ //TODO
    private $discount;
}
