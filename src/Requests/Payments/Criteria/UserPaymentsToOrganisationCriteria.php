<?php namespace Ordercloud\Requests\Payments\Criteria;

use Ordercloud\Requests\Criteria\Criteria;
use Ordercloud\Requests\Criteria\PaginationCriterion;

class UserPaymentsToOrganisationCriteria extends Criteria
{
    use PaginationCriterion;
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $to;

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from date
     *
     * @return static
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to date
     *
     * @return static
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }
}
