<?php namespace Ordercloud\Requests\Connections;

use Ordercloud\Requests\Connections\Criteria\AdvancedConnectionCriteria;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetConnectionsRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\GetOrganisationConnectionsRequestHandler
 */
class GetConnectionsRequest implements Command
{
    /**
     * @var int|null
     */
    private $organisationId;
    /**
     * @var \Ordercloud\Requests\Connections\Criteria\AdvancedConnectionCriteria
     */
    private $criteria;

    /**
     * @param int|null                                                             $organisationId
     * @param \Ordercloud\Requests\Connections\Criteria\AdvancedConnectionCriteria $criteria
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
