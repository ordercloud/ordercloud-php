<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Organisations\OrganisationShort;

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
}
