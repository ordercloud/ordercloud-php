<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetOrganisationAddressRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\GetOrganisationAddressRequestHandler
 */
class GetOrganisationAddressRequest implements Command
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
