<?php namespace Ordercloud\Support;

class PaginatedCollection extends Collection
{
    /** @var int */
    protected $totalCount;
    /** @var int */
    protected $currentPage;
    /** @var int */
    protected $pageSize;
    /** @var int */
    protected $totalNrPages;
    /** @var int */
    protected $nextPage;
    /** @var int */
    protected $previousPage;

    /**
     * @param array $items
     * @param int   $totalCount
     * @param int   $currentPage
     * @param int   $pageSize
     */
    public function __construct(array $items, $totalCount, $currentPage, $pageSize)
    {
        parent::__construct($items);
        $this->totalCount = $totalCount;
        $this->currentPage = $currentPage;
        $this->pageSize = $pageSize;
        $this->totalNrPages = intval(ceil($totalCount / $pageSize));
        $this->nextPage = $this->totalNrPages > $currentPage ? $currentPage + 1 : null;
        $this->previousPage = $currentPage > 1 ? $currentPage - 1 : null;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return int
     */
    public function getTotalNrPages()
    {
        return $this->totalNrPages;
    }

    /**
     * @return int
     */
    public function getNextPage()
    {
        return $this->nextPage;
    }

    /**
     * @return int
     */
    public function getPreviousPage()
    {
        return $this->previousPage;
    }

    public function hasNextPage()
    {
        return ! is_null($this->getNextPage());
    }

    public function hasPreviousPage()
    {
        return ! is_null($this->getPreviousPage());
    }
}
