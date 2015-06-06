<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class GetProductTagsForOrganisationByTypeNameRequest implements Command
{
    /** @var int */
    private $organisationID;
    /** @var string */
    private $tagName;
    /** @var string|null */
    protected $accessToken;

    public function __construct($organisationID, $tagName, $accessToken = null)
    {
        $this->organisationID = $organisationID;
        $this->tagName = $tagName;
        $this->accessToken = $accessToken;
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

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
