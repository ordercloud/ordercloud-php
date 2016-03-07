<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Requests\Connections\Criteria\AdvancedConnectionCriteria;
use Ordercloud\Requests\Connections\Criteria\BasicConnectionCriteria;
use Ordercloud\Requests\Connections\GetOrganisationConnectionsByTypeRequest;
use Ordercloud\Requests\Connections\GetOrganisationConnectionsRequest;

class ConnectionService extends OrdercloudService
{
    /**
     * @param int                          $typeCode
     * @param int|null                     $organisationId
     * @param BasicConnectionCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getConnectionsByType($typeCode, $organisationId = null, BasicConnectionCriteria $criteria = null)
    {
        $criteria = $criteria ?: BasicConnectionCriteria::create();

        return $this->request(
            new GetOrganisationConnectionsByTypeRequest($typeCode, $organisationId, $criteria)
        );
    }

    /**
     * @param int|null                     $organisationId
     * @param BasicConnectionCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getChildConnections($organisationId = null, BasicConnectionCriteria $criteria = null)
    {
        return $this->getConnectionsByType(ConnectionType::CHILD, $organisationId, $criteria);
    }

    /**
     * @param int|null                     $organisationId
     * @param BasicConnectionCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getMarketplaceConnections($organisationId = null, BasicConnectionCriteria $criteria = null)
    {
        return $this->getConnectionsByType(ConnectionType::MARKETPLACE, $organisationId, $criteria);
    }

    /**
     * @param int|null                        $organisationId
     * @param AdvancedConnectionCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getConnections($organisationId = null, AdvancedConnectionCriteria $criteria = null)
    {
        $criteria = $criteria ?: AdvancedConnectionCriteria::create();

        return $this->request(
            new GetOrganisationConnectionsRequest($organisationId, $criteria)
        );
    }
}
