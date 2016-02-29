<?php namespace Ordercloud\Requests\Products\Criteria;

use Ordercloud\Requests\Criteria\Criteria;
use Ordercloud\Requests\Criteria\PaginationCriterion;

class ProductCriteria extends Criteria
{
    use PaginationCriterion;

    /**
     * @var array|ProductTagCriteria[]
     */
    private $tags;
    /**
     * @var bool
     */
    private $available;
    /**
     * @var array|string[]
     */
    private $orders;
    /**
     * @var array|int[]
     */
    private $organisations;
    /**
     * @var bool
     */
    private $showDisabled = false;

    /**
     * @return array|ProductTagCriteria[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array|ProductTagCriteria[] $tags
     *
     * @return static
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param boolean $available
     *
     * @return static
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param array|string[] $orders
     *
     * @return static
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }

    /**
     * @param array|int[] $organisations
     *
     * @return static
     */
    public function setOrganisations($organisations)
    {
        $this->organisations = $organisations;

        return $this;
    }

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
