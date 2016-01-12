<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Support\PaginatedCollection;

class OrderCollection extends PaginatedCollection implements JsonSerializable
{
    /**
     * @param array|Order[] $items
     * @param int           $totalCount
     * @param int           $currentPage
     * @param int           $pageSize
     */
    public function __construct(array $items, $totalCount, $currentPage, $pageSize)
    {
        parent::__construct($items, $totalCount, $currentPage, $pageSize);
    }

    /**
     * @return Order[]
     */
    public function all()
    {
        return parent::all();
    }
}
