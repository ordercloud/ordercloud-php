<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Requests\Payments\Criteria\UserPaymentsToOrganisationCriteria;
use Ordercloud\Support\CommandBus\Command;

class GetUserPaymentsToOrganisationRequest implements Command
{
    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $organisationId;
    /**
     * @var UserPaymentsToOrganisationCriteria
     */
    private $criteria;

    /**
     * @param int                                $userId
     * @param int                                $organisationId
     * @param UserPaymentsToOrganisationCriteria $criteria
     */
    public function __construct($userId, $organisationId, UserPaymentsToOrganisationCriteria $criteria)
    {
        $this->userId = $userId;
        $this->organisationId = $organisationId;
        $this->criteria = $criteria;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return UserPaymentsToOrganisationCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
