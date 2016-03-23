<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;
use Ordercloud\Entities\Connections\ConnectionShort;
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
    /** @var ConnectionShort */
    private $connection;
    /** @var ProductShort */
    private $productItem;
    /** @var float */
    private $amount;
    /** @var string */
    private $startDate;
    /** @var boolean */
    private $enabled;
    /**
     * @var string
     */
    private $endDate;

    public function __construct($id, OrganisationShort $organisation = null, OrganisationShort $discountProvider, OrganisationShort $brand = null, ConnectionShort $connection = null, ProductShort $productItem = null, $amount, $startDate = null, $endDate = null, $enabled)
    {
        $this->id = $id;
        $this->organisation = $organisation;
        $this->discountProvider = $discountProvider;
        $this->brand = $brand;
        $this->connection = $connection;
        $this->productItem = $productItem;
        $this->amount = $amount;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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
     * @return ConnectionShort
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return ProductShort
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
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
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
            'id'               => $this->getId(),
            'organisation'     => $this->getOrganisation(),
            'discountProvider' => $this->getDiscountProvider(),
            'brand'            => $this->getBrand(),
            'connection'       => $this->getConnection(),
            'productItem'      => $this->getProductItem(),
            'amount'           => $this->getAmount(),
            'startDate'        => $this->getStartDate(),
            'endDate'          => $this->getEndDate(),
            'enabled'          => $this->isEnabled(),
        ];
    }
}
