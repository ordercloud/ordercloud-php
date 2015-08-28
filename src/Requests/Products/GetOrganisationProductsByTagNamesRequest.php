<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationProductsByTagNamesRequest implements Command
{
    /**
     * @var array|int[]
     */
    private $organisationIDs;
    /**
     * @var array|string[]
     */
    private $tagNames;
    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $pageSize;

    /**
     * @param array|int[]    $organisationIDs
     * @param array|string[] $tagNames
     * @param int            $page
     * @param int            $pageSize
     */
    public function __construct(array $organisationIDs, array $tagNames, $page = 1, $pageSize = 10)
    {
        // TODO: ProductCriteria
        $this->organisationIDs = $organisationIDs;
        $this->tagNames = $tagNames;
        $this->page = $page;
        $this->pageSize = $pageSize;
    }

    /**
     * @return int
     */
    public function getOrganisationIDs()
    {
        return $this->organisationIDs;
    }

    /**
     * @return array|string[]
     */
    public function getTagNames()
    {
        return $this->tagNames;
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
