<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetProductTagsForOrganisationByTypeNameRequest
 *
 * @see Ordercloud\Requests\Products\Handlers\GetProductTagsForOrganisationByTypeNameRequestHandler
 */
class GetProductTagsForOrganisationByTypeNameRequest implements Command
{
    /** @var int */
    private $organisationID;
    /** @var string */
    private $tagName;

    /**
     * @param int    $organisationID
     * @param string $tagName
     */
    public function __construct($organisationID, $tagName)
    {
        $this->organisationID = $organisationID;
        $this->tagName = $tagName;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }

    /**
     * @return string
     */
    public function getTagName()
    {
        return $this->tagName;
    }
}
