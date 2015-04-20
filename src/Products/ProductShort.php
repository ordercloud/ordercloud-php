<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\OrganisationShort;

class ProductShort
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var float */
    private $price;
    /** @var string */
    private $description;
    /** @var string */
    private $shortDescription;
    /** @var OrganisationShort */
    private $organisation;
    /** @var boolean */
    private $available;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $sku;
    /** @var boolean */
    private $availableOnline;
    /** @var ProductType */
    private $productType;
    /**
     * @var array|ProductShort[]
     *
     * eg. meal => burger + chips + coke
     */
    private $groupItems;

    function __construct($id, $name, $price, $description, $shortDescription, OrganisationShort $organisation, $available, $enabled, $sku, $availableOnline, ProductType $productType, array $groupItems)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->organisation = $organisation;
        $this->available = $available;
        $this->enabled = $enabled;
        $this->sku = $sku;
        $this->availableOnline = $availableOnline;
        $this->productType = $productType;
        $this->groupItems = $groupItems;
    }
}
