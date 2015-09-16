<?php namespace Ordercloud\Entities\Orders;

class MerchantItems
{
    /**
     * @var OrderItemMerchant
     */
    private $merchant;
    /**
     * @var array|OrderItem[]
     */
    private $items;

    /**
     * @param OrderItemMerchant $merchant
     * @param array|OrderItem[] $items
     */
    public function __construct(OrderItemMerchant $merchant, array $items = [])
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
            $groupedItems = self::groupItem($item, $groupedItems);
        }

        $merchantItems = [];

        foreach ($groupedItems as $grouping) {
            $merchantItems[] = new static($grouping['org'], $grouping['items']);
        }

        return $merchantItems;
    }

    /**
     * @param OrderItem $item
     * @param array     $groupedItems
     *
     * @return array
     */
    protected static function groupItem(OrderItem $item, array $groupedItems)
    {
        $merchantId = $item->getDetail()->getOrganisation()->getId();

        if ( ! array_key_exists($merchantId, $groupedItems)) {
            $groupedItems[$merchantId] = [
                'org' => $item->getDetail()->getOrganisation(),
                'items' => []
            ];
        }

        $groupedItems[$merchantId]['items'][] = $item;

        return $groupedItems;
    }

    /**
     * @return OrderItemMerchant
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

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        $total = 0.0;

        foreach ($this->getItems() as $item) {
            $total = bcadd($total, $item->getLinePrice(), 2);
        }

        return $total;
    }
}
