<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class GetProductRequest implements Command
{
    /** @var int */
    protected $productID;

    /**
     * @param int $productID
     */
    public function __construct($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return int
     */
    public function getProductID()
    {
        return $this->productID;
    }
}
