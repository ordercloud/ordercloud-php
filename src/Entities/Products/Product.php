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
    /**
     * @var array|ProductItemsProductAttribute[]
     * @reflectType Ordercloud\Entities\Products\ProductItemsProductAttribute
     */
    private $attributes;
    /**
     * @var array|ProductOptionSet[]
     * @reflectName options
     * @reflectType Ordercloud\Entities\Products\ProductOptionSet
     */
    private $optionSets;
    /**
     * @var array|ProductExtraSet[]
     * @reflectName extras
     * @reflectType Ordercloud\Entities\Products\ProductExtraSet
     */
    private $extraSets;
    /**
     * @var array|ProductTag[]
     * @reflectType Ordercloud\Entities\Products\ProductTag
     */
    private $tags;
    /** @var OrganisationShort */
    private $organisation;
    /** @var boolean */
    private $enabled;
    /** @var boolean */
    private $available;
    /** @var boolean */
    private $availableOnline;
    /**
     * @var array|ProductImage[]
     * @reflectType Ordercloud\Entities\Products\ProductImage
     */
    private $images;
    /**
     * @var array|Product[]
     * @reflectType Ordercloud\Entities\Products\Product
     */
    private $groupItems;
    /** @var ProductType */
    private $productType;
    /** @var ProductPriceDiscount */
    private $discount;

    public function __construct($id, $name, $description, $shortDescription, $sku, $price, array $attributes, array $optionSets, array $extraSets, array $tags, OrganisationShort $organisation, $enabled, $available, $availableOnline, array $images, array $groupItems, ProductType $productType, ProductPriceDiscount $discount = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->sku = $sku;
        $this->price = $price;
        $this->attributes = $attributes;
        $this->optionSets = $optionSets;
        $this->extraSets = $extraSets;
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return array|ProductItemsProductAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return array|ProductOptionSet[]
     */
    public function getOptionSets()
    {
        return $this->optionSets;
    }

    /**
     * @param $optionSetID
     *
     * @return ProductOptionSet|null
     */
    public function getOptionSetByID($optionSetID)
    {
        foreach ($this->getOptionSets() as $optionSet) {
            if ($optionSet->getId() == $optionSetID) {
                return $optionSet;
            }
        }

        return null;
    }

    /**
     * @return array|ProductExtraSet[]
     */
    public function getExtraSets()
    {
        return $this->extraSets;
    }

    /**
     * @param $extraSetID
     *
     * @return ProductExtraSet|null
     */
    public function getExtraSetByID($extraSetID)
    {
        foreach ($this->getExtraSets() as $extraSet) {
            if ($extraSet->getId() == $extraSetID) {
                return $extraSet;
            }
        }

        return null;
    }

    /**
     * @return array|ProductTag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tagType
     *
     * @return ProductTag|null
     */
    public function getTagByType($tagType)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag->isType($tagType)) {
                return $tag;
            }
        }

        return null;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @return boolean
     */
    public function isAvailableOnline()
    {
        return $this->availableOnline;
    }

    /**
     * @return array|ProductImage[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return ProductImage|null
     */
    public function getDefaultImage()
    {
        foreach ($this->getImages() as $image) {
            if ($image->isDefault()) {
                return $image;
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasDefaultImage()
    {
        return ! is_null($this->getDefaultImage());
    }

    /**
     * @return bool
     */
    public function hasImages()
    {
        return sizeof($this->getImages()) > 0;
    }

    /**
     * @return array|Product[]
     */
    public function getGroupItems()
    {
        return $this->groupItems;
    }

    /**
     * @return ProductType
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @return ProductPriceDiscount
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
