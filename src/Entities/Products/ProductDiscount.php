<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;
use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductDiscount implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var OrganisationShort */
    private $organisation;
    /** @var OrganisationShort */
    private $discountProvider;
    /** @var OrganisationShort */
    private $brand;
    /** @var Connection */
    private $connection;
    /** @var Product */
    private $productItem;
    /** @var float */
    private $amount;
    /** @var string */
    private $startDate;
    /** @var boolean */
    private $enabled;

    public function __construct($id, OrganisationShort $organisation, OrganisationShort $discountProvider, OrganisationShort $brand, Connection $connection, Product $productItem, $amount, $startDate, $enabled)
    {
        $this->id = $id;
        $this->organisation = $organisation;
        $this->discountProvider = $discountProvider;
        $this->brand = $brand;
        $this->connection = $connection;
        $this->productItem = $productItem;
        $this->amount = $amount;
        $this->startDate = $startDate;
        $this->enabled = $enabled;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return OrganisationShort
     */
    public function getDiscountProvider()
    {
        return $this->discountProvider;
    }

    /**
     * @return OrganisationShort
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return Product
     */
    public function getProductItem()
    {
        return $this->productItem;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'organisation' => $this->getOrganisation(),
            'discountProvider' => $this->getDiscountProvider(),
            'brand' => $this->getBrand(),
            'connection' => $this->getConnection(),
            'productItem' => $this->getProductItem(),
            'amount' => $this->getAmount(),
            'startDate' => $this->getStartDate(),
            'enabled' => $this->isEnabled(),
        ];
    }
}
