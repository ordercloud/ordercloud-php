<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Support\Http\Request;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\PaginatedCollection;

class OrderCollection extends PaginatedCollection
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
}
