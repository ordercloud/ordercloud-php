<?php namespace Ordercloud\Requests\Orders\Criteria;

use Ordercloud\Requests\Criteria\Criteria;
use Ordercloud\Requests\Criteria\PaginationCriterion;
use Ordercloud\Requests\Criteria\SortCriterion;

class UserOrderCriteria extends Criteria
{
    use PaginationCriterion,
        SortCriterion;

    /**
     * @var array|int[]
     */
    private $orderStatuses;
    /**
     * @var array|string[]
     */
    private $paymentStatuses;

    /**
     * @return array|int[]
     */
    public function getOrderStatuses()
    {
        return $this->orderStatuses;
    }

    /**
     * @param array|int[] $orderStatuses
     *
     * @return static
     */
    public function setOrderStatuses($orderStatuses)
    {
        $this->orderStatuses = $orderStatuses;

        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getPaymentStatuses()
    {
        return $this->paymentStatuses;
    }

    /**
     * @param array|string[] $paymentStatuses
     *
     * @return static
     */
    public function setPaymentStatuses($paymentStatuses)
    {
        $this->paymentStatuses = $paymentStatuses;

        return $this;
    }
}
