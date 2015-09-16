<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Products\ProductShort;
use Ordercloud\Entities\Products\ProductType;

class OrderItemDetail extends ProductShort
{
    public function __construct($id, $name, $price, $description, $shortDescription, OrderItemMerchant $organisation, $available, $enabled, $sku, $availableOnline, ProductType $productType, array $groupItems)
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
     * @return OrderItemMerchant
     */
    public function getMerchant()
    {
        return $this->getOrganisation();
    }
}
