<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationProductsByTagNamesRequest implements Command
{
    /** @var array|int[] */
    private $organisationIDs;
    /** @var array|string[] */
    private $tagNames;

    /**
     * @param int         $organisationIDs
     * @param array       $tagNames
     * @param string|null $accessToken
     */
    public function __construct(array $organisationIDs, array $tagNames) // TODO: ProductCriteria
    {
        $this->organisationIDs = $organisationIDs;
        $this->tagNames = $tagNames;
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
}
