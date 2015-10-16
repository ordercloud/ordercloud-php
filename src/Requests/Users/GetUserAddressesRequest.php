<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Requests\Users\Criteria\UserAddressCriteria;
use Ordercloud\Support\CommandBus\Command;

class GetUserAddressesRequest implements Command
{
    /** @var int */
    protected $userID;

    /**
     * @var UserAddressCriteria
     */
    private $criteria;

    /**
     * @param int                 $userID
     * @param UserAddressCriteria $criteria
     */
    public function __construct($userID, UserAddressCriteria $criteria)
    {
        $this->userID = $userID;
        $this->criteria = $criteria;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return UserAddressCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
