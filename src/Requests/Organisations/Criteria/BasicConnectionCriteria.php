<?php namespace Ordercloud\Requests\Organisations\Criteria;

use Ordercloud\Requests\Criteria\Criteria;
use Ordercloud\Requests\Criteria\PaginationCriterion;
use Ordercloud\Requests\Criteria\SortCriterion;

class BasicConnectionCriteria extends Criteria
{
    use PaginationCriterion,
        SortCriterion;

    /** @var bool */
    private $showDisabled = false;

    /**
     * @return boolean
     */
    public function getShowDisabled()
    {
        return $this->showDisabled;
    }

    /**
     * @param boolean $showDisabled
     *
     * @return static
     */
    public function setShowDisabled($showDisabled)
    {
        $this->showDisabled = $showDisabled;

        return $this;
    }
}
