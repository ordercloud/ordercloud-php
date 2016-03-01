<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductShort implements JsonSerializable
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
     * @reflectType Ordercloud\Entities\Products\ProductShort
     *
     * eg. meal => burger + chips + coke
     */
    private $groupItems;

    public function __construct($id, $name, $price, $description, $shortDescription, OrganisationShort $organisation, $available, $enabled, $sku, $availableOnline, ProductType $productType, array $groupItems)
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
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
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
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
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return boolean
     */
    public function isAvailableOnline()
    {
        return $this->availableOnline;
    }

    /**
     * @return ProductType
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @return array|ProductShort[]
     */
    public function getGroupItems()
    {
        return $this->groupItems;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'description' => $this->getDescription(),
            'shortDescription' => $this->getShortDescription(),
            'organisation' => $this->getOrganisation(),
            'available' => $this->isAvailable(),
            'enabled' => $this->isEnabled(),
            'sku' => $this->getSku(),
            'availableOnline' => $this->isAvailableOnline(),
            'productType' => $this->getProductType(),
            'groupItems' => $this->getGroupItems(),
        ];
    }
}
