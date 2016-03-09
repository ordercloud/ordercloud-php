<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Requests\Organisations\Criteria\BasicConnectionCriteria;
use Ordercloud\Support\CommandBus\Command;

/**
 * @deprecated See Ordercloud\Requests\Connections\GetConnectionsByTypeRequest
 *
 * Class GetConnectionsByTypeRequest
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
     * @var BasicConnectionCriteria
     */
    private $criteria;

    /**
     * @param int                     $typeCode
     * @param int|null                $organisationId
     * @param BasicConnectionCriteria $criteria
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
     * @return BasicConnectionCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
