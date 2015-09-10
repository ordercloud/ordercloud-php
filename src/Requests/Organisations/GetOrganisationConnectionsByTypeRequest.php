<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Requests\Organisations\Criteria\ConnectionsByTypeCriteria;
use Ordercloud\Support\CommandBus\Command;

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
     * @var ConnectionsByTypeCriteria
     */
    private $criteria;

    /**
     * @param int                       $typeCode
     * @param int|null                  $organisationId
     * @param ConnectionsByTypeCriteria $criteria
     */
    public function __construct($typeCode, $organisationId = null, ConnectionsByTypeCriteria $criteria)
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
     * @return ConnectionsByTypeCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
