<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

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
    /** @var OrganisationShort */
    private $organisation;
    /** @var boolean */
    private $enabled;
    /** @var boolean */
    private $available;
    /** @var boolean */
    private $availableOnline;
    /** @var array|ProductImage[] */
    private $images;
    /** @var array|Product[] */
    private $groupItems;
    /** @var ProductType */
    private $productType;
    /** @var ProductPriceDiscount */
    private $discount;

    function __construct($id, $name, $description, $shortDescription, $sku, $price, array $attributes, array $options, array $extras, array $tags, OrganisationShort $organisation, $enabled, $available, $availableOnline, array $images, array $groupItems, ProductType $productType, ProductPriceDiscount $discount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->sku = $sku;
        $this->price = $price;
        $this->attributes = $attributes;
        $this->options = $options;
        $this->extras = $extras;
        $this->tags = $tags;
        $this->organisation = $organisation;
        $this->enabled = $enabled;
        $this->available = $available;
        $this->availableOnline = $availableOnline;
        $this->images = $images;
        $this->groupItems = $groupItems;
        $this->productType = $productType;
        $this->discount = $discount;
    }
}
