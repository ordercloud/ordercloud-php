<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Organisations\OrganisationShort;

class MerchantItems
{
    /**
     * @var OrganisationShort
     */
    private $merchant;
    /**
     * @var array|OrderItem[]
     */
    private $items;

    /**
     * @param OrganisationShort $merchant
     * @param array|OrderItem[] $items
     */
    public function __construct(OrganisationShort $merchant, array $items = [])
    {
        $this->merchant = $merchant;
        $this->items = $items;
    }

    /**
     * @param Order $order
     *
     * @return array|static[]
     */
    public static function createFromOrder(Order $order)
    {
        $groupedItems = [];

        foreach ($order->getItems() as $item) {
            $merchantId = $item->getDetail()->getOrganisation()->getId();

            if (array_key_exists($merchantId, $groupedItems)) {
                $groupedItems[$merchantId]['items'][] = $item;
            }
            else {
                $groupedItems[$merchantId] = [];
                $groupedItems[$merchantId]['org'] = $item->getDetail()->getOrganisation();
                $groupedItems[$merchantId]['items'] = [$item];
            }
        }

        $merchantItems = [];

        foreach ($groupedItems as $grouping) {
            $merchantItems[] = new static($grouping['org'], $grouping['items']);
        }

        return $merchantItems;
    }

    /**
     * @return OrganisationShort
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @return array|OrderItem[]
     */
    public function getItems()
    {
        return $this->items;
    }
}
