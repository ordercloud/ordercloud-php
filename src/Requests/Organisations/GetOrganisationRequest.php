<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetOrganisationRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\GetOrganisationRequestHandler
 */
class GetOrganisationRequest implements Command
{
    /** @var integer */
    private $organisationID;

    public function __construct($organisationID)
    {
        $this->organisationID = $organisationID;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }
}
