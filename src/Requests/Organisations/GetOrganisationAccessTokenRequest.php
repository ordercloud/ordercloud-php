<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Support\CommandBus\Command;

class GetOrganisationAccessTokenRequest implements Command
{
    /**
     * @var integer
     */
    private $organisationID;
    /**
     * @var Authorisation|null
     */
    private $authorisation;

    /**
     * @param int           $organisationID
     * @param Authorisation $authorisation
     */
    public function __construct($organisationID, Authorisation $authorisation = null)
    {
        $this->organisationID = $organisationID;
        $this->authorisation = $authorisation;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }

    /**
     * @return string|null
     */
    public function getAuthorisation()
    {
        return $this->authorisation;
    }
}
