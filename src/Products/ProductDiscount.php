<?php namespace Ordercloud\Products;

use Ordercloud\Connections\Connection;
use Ordercloud\Organisations\OrganisationShort;

class ProductDiscount
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

    function __construct($id, OrganisationShort $organisation, OrganisationShort $discountProvider, OrganisationShort $brand, Connection $connection, Product $productItem, $amount, $startDate, $enabled)
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
}
