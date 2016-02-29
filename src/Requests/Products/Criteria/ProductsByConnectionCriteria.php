<?php namespace Ordercloud\Requests\Products\Criteria;

use Ordercloud\Requests\Criteria\Criteria;
use Ordercloud\Requests\Criteria\PaginationCriterion;

class ProductsByConnectionCriteria extends Criteria
{
    use PaginationCriterion;
    
    /**
     * @var boolean
     */
    private $showDisabled;

    /**
     * @return boolean
     */
    public function isShowDisabled()
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
