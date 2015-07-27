<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Products\ProductShort;
use Ordercloud\Entities\Products\ProductType;

class OrderItemDetail extends ProductShort
{
    public function __construct($id, $name, $price, $description, $shortDescription, Merchant $organisation, $available, $enabled, $sku, $availableOnline, ProductType $productType, array $groupItems)
    {
        parent::__construct(
            $id,
            $name,
            $price,
            $description,
            $shortDescription,
            $organisation,
            $available,
            $enabled,
            $sku,
            $availableOnline,
            $productType,
            $groupItems
        );
    }

    /**
     * @return Merchant
     */
    public function getMerchant()
    {
        return parent::getOrganisation();
    }
}
