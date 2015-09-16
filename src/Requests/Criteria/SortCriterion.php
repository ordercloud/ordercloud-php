<?php namespace Ordercloud\Requests\Criteria;

trait SortCriterion
{
    /**
     * @var string
     */
    private $sort;

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     *
     * @return static
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }
}
