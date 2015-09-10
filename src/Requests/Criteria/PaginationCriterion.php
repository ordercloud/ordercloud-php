<?php namespace Ordercloud\Requests\Criteria;

trait PaginationCriterion
{
    /**
     * @var int
     */
    private $page = 1;
    /**
     * @var int
     */
    private $pageSize = 20;

    /**
     * @param int $page
     *
     * @return static
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param int $pageSize
     *
     * @return static
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }
}
