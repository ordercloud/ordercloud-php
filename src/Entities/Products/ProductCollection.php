<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;
use Ordercloud\Support\PaginatedCollection;

class ProductCollection extends PaginatedCollection implements JsonSerializable
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

    /**
     * @return Product[]
     */
    public function all()
    {
        return parent::all();
    }
}
