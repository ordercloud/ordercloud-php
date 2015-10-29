<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetSettingsByOrganisationRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\GetSettingsByOrganisationRequestHandler
 */
class GetSettingsByOrganisationRequest implements Command
{
    /**
     * @var int
     */
    private $organisationId;

    public function __construct($organisationId)
    {
        $this->organisationId = $organisationId;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }
}
