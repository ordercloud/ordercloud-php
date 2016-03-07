<?php namespace Ordercloud\Requests\Connections;

use Ordercloud\Requests\Connections\Criteria\BasicConnectionCriteria;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetOrganisationConnectionsByTypeRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\GetOrganisationConnectionsByTypeRequestHandler
 */
class GetOrganisationConnectionsByTypeRequest implements Command
{
    /**
     * @var int
     */
    private $typeCode;
    /**
     * @var int|null
     */
    private $organisationId;
    /**
     * @var \Ordercloud\Requests\Connections\Criteria\BasicConnectionCriteria
     */
    private $criteria;

    /**
     * @param int                                                               $typeCode
     * @param int|null                                                          $organisationId
     * @param \Ordercloud\Requests\Connections\Criteria\BasicConnectionCriteria $criteria
     */
    public function __construct($typeCode, $organisationId = null, BasicConnectionCriteria $criteria)
    {
        $this->typeCode = $typeCode;
        $this->organisationId = $organisationId;
        $this->criteria = $criteria;
    }

    /**
     * @return int
     */
    public function getTypeCode()
    {
        return $this->typeCode;
    }

    /**
     * @return int|null
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return bool
     */
    public function hasOrganisationId()
    {
        return ! is_null($this->organisationId);
    }

    /**
     * @return \Ordercloud\Requests\Connections\Criteria\BasicConnectionCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
