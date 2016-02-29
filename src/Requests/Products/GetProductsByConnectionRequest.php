<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Requests\Products\Criteria\ProductsByConnectionCriteria;
use Ordercloud\Support\CommandBus\Command;

class GetProductsByConnectionRequest implements Command
{
    /**
     * @var int
     */
    private $connectionId;
    /**
     * @var ProductsByConnectionCriteria
     */
    private $criteria;

    /**
     * @param int                          $connectionId
     * @param ProductsByConnectionCriteria $criteria
     */
    public function __construct($connectionId, ProductsByConnectionCriteria $criteria)
    {
        $this->connectionId = $connectionId;
        $this->criteria = $criteria;
    }

    /**
     * @return int
     */
    public function getConnectionId()
    {
        return $this->connectionId;
    }

    /**
     * @return ProductsByConnectionCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
