<?php namespace Ordercloud\Requests;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationProductsByTagNames implements Command
{
    /** @var int */
    private $organisationID;
    /** @var string|string */
    private $accessToken;
    /** @var array|string[] */
    private $tagNames;

    /**
     * @param int         $organisationID
     * @param array       $tagNames
     * @param string|null $accessToken
     */
    public function __construct($organisationID, array $tagNames, $accessToken = null)
    {
        $this->organisationID = $organisationID;
        $this->tagNames = $tagNames;
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
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return array|string[]
     */
    public function getTagNames()
    {
        return $this->tagNames;
    }
}
