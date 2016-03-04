<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;
use Ordercloud\Support\PaginatedCollection;

class ProductTagCollection extends PaginatedCollection implements JsonSerializable
{
    /**
     * @param array|ProductTag[] $items
     * @param int                $totalCount
     * @param int                $currentPage
     * @param int                $pageSize
     */
    public function __construct(array $items, $totalCount, $currentPage, $pageSize)
    {
        parent::__construct($items, $totalCount, $currentPage, $pageSize);
    }

    /**
     * @return ProductTag[]
     */
    public function all()
    {
        return parent::all();
    }
}
