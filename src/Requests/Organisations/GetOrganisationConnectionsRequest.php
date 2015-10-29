<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Requests\Organisations\Criteria\AdvancedConnectionCriteria;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetOrganisationConnectionsRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\GetOrganisationConnectionsRequestHandler
 */
class GetOrganisationConnectionsRequest implements Command
{
    /**
     * @var int|null
     */
    private $organisationId;
    /**
     * @var AdvancedConnectionCriteria
     */
    private $criteria;

    /**
     * @param int|null                   $organisationId
     * @param AdvancedConnectionCriteria $criteria
     */
    public function __construct($organisationId = null, AdvancedConnectionCriteria $criteria)
    {
        $this->organisationId = $organisationId;
        $this->criteria = $criteria;
    }

    /**
     * @return int|null
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return AdvancedConnectionCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
