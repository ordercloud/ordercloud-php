<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Products\ProductShort;
use Ordercloud\Entities\Products\ProductType;

class OrderItemDetail extends ProductShort implements JsonSerializable
{
    public function __construct($id, $name, $price, $description, $shortDescription, OrderItemMerchant $organisation, $available, $enabled, $sku, $availableOnline, ProductType $productType, array $groupItems, OrderStatus $status)
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
            $groupItems,
            $status
        );
    }

    /**
     * @return OrderItemMerchant
     */
    public function getMerchant()
    {
        return $this->getOrganisation();
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['merchant'] = $this->getMerchant();

        return $json;
    }
}
