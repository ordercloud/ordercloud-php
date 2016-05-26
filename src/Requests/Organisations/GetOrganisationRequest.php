<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationRequest implements Command
{
    /** @var integer */
    private $organisationId;
    
    public function __construct($organisationId = null)
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
