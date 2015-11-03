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
     * @var array|ProductAttributeSet[]
     * @reflectType Ordercloud\Entities\Products\ProductAttributeSet
     */
    private $attributeSets;
    /**
     * @var array|ProductOptionSet[]
     * @reflectType Ordercloud\Entities\Products\ProductOptionSet
     */
    private $optionSets;
    /**
     * @var array|ProductExtraSet[]
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
    /** @var Boolean */
    private $globalProduct;

    public function __construct($id, $name, $description, $shortDescription, $sku, $price, array $attributeSets, array $optionSets, array $extraSets, array $tags, OrganisationShort $organisation, $enabled, $available, $availableOnline, array $images, array $groupItems, ProductType $productType, ProductPriceDiscount $discount = null, $globalProduct)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->sku = $sku;
        $this->price = $price;
        $this->attributeSets = $attributeSets;
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
        $this->globalProduct = $globalProduct;
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
     * @return array|ProductAttributeSet[]
     */
    public function getAttributeSets()
    {
        return $this->attributeSets;
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

        foreach ($this->getUnlockableOptionSets() as $optionSet) {
            if ($optionSet->getId() == $optionSetID) {
                return $optionSet;
            }
        }

        return null;
    }

    /**
     * @return array|UnlockableProductOptionSet[]
     */
    public function getUnlockableOptionSets()
    {
        return UnlockableProductOptionSet::createFromProduct($this);
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

        foreach ($this->getUnlockableExtraSets() as $extraSet) {
            if ($extraSet->getId() == $extraSetID) {
                return $extraSet;
            }
        }

        return null;
    }

    /**
     * @return array|UnlockableProductExtraSet[]
     */
    public function getUnlockableExtraSets()
    {
        return UnlockableProductExtraSet::createFromProduct($this);
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

    /** @return boolean */
    public function isGlobalProduct()
    {
        return $this->globalProduct;
    }
}
