<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Support\PaginatedCollection;

class ProductCollection extends PaginatedCollection
{
    /**
     * @param array|Product[] $items
     * @param int             $totalCount
     * @param int             $currentPage
     * @param int             $pageSize
     */
    public function __construct(array $items, $totalCount, $currentPage, $pageSize)
    {
        parent::__construct($items, $totalCount, $currentPage, $pageSize);
    }
}
