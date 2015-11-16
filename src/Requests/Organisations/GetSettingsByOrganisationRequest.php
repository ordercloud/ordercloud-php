<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Requests\Settings\Criteria\SettingsCriteria;
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

    /** @var SettingsCriteria */
    private $criteria;

    public function __construct($organisationId, SettingsCriteria $criteria)
    {
        $this->organisationId = $organisationId;
        $this->criteria = $criteria;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return SettingsCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
