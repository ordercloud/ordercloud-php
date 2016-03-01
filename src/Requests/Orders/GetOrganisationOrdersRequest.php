<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Requests\Orders\Criteria\OrganisationOrderCriteria;
use Ordercloud\Support\CommandBus\Command;

class GetOrganisationOrdersRequest implements Command
{
    /**
     * @var int
     */
    private $organisationId;
    /**
     * @var OrganisationOrderCriteria
     */
    private $criteria;

    /**
     * @param int                       $organisationId
     * @param OrganisationOrderCriteria $criteria
     */
    public function __construct($organisationId, OrganisationOrderCriteria $criteria)
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
     * @return OrganisationOrderCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
