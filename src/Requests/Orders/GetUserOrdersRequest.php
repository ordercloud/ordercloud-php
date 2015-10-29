<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Requests\Orders\Criteria\UserOrderCriteria;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetUserOrdersRequest
 *
 * @see Ordercloud\Requests\Orders\Handlers\GetUserOrdersRequestHandler
 */
class GetUserOrdersRequest implements Command
{
    /** @var int */
    protected $userId;
    /**
     * @var UserOrderCriteria
     */
    private $criteria;

    /**
     * @param int               $userId
     * @param UserOrderCriteria $criteria
     */
    public function __construct($userId, UserOrderCriteria $criteria)
    {
        $this->userId = $userId;
        $this->criteria = $criteria;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return UserOrderCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
