<?php namespace Ordercloud\Requests\Settings;

use Ordercloud\Support\CommandBus\Command;

class GetSettingsByOrganisationRequest implements Command
{
    /**
     * @var int
     */
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
