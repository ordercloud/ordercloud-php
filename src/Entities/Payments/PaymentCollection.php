<?php namespace Ordercloud\Entities\Payments;

use JsonSerializable;
use Ordercloud\Support\PaginatedCollection;

class PaymentCollection extends PaginatedCollection implements JsonSerializable
{
    /**
     * @param Payment[] $items
     * @param int       $totalCount
     * @param int       $currentPage
     * @param int       $pageSize
     */
    public function __construct(array $items, $totalCount, $currentPage, $pageSize)
    {
        parent::__construct($items, $totalCount, $currentPage, $pageSize);
    }

    /**
     * @return Payment[]
     */
    public function all()
    {
        return parent::all();
    }
}
