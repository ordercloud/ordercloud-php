<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationRequest implements Command
{
    /** @var integer */
    private $organisationID;
    /** @var string */
    private $accessToken;

    public function __construct($organisationID, $accessToken = null)
    {
        $this->organisationID = $organisationID;
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
}
