<?php namespace Ordercloud\Entities\Delivery;

use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Entities\Users\UserShort;

class DeliveryAgent
{
    /** @var integer */
    private $id;
    /** @var UserShort */
    private $userProfile;
    /** @var OrganisationShort */
    private $organisation;
    /** @var float */
    private $minBalance;
    /** @var float */
    private $maxBalance;
    /** @var boolean */
    private $enabled;
    /** @var DeliveryAgentStatus */
    private $status;
    /**
     * @var string
     * The MASKED account number. Only shows the last 6 digits.
     */
    private $accountNo;
    /**
     * @var string
     * The MASKED card number. Only shows the last 4 digits.
     */
    private $cardNo;

    public function __construct($id, UserShort $userProfile, OrganisationShort $organisation, $minBalance, $maxBalance, $enabled, DeliveryAgentStatus $status, $accountNo, $cardNo)
    {
        $this->id = $id;
        $this->userProfile = $userProfile;
        $this->organisation = $organisation;
        $this->minBalance = $minBalance;
        $this->maxBalance = $maxBalance;
        $this->enabled = $enabled;
        $this->status = $status;
        $this->accountNo = $accountNo;
        $this->cardNo = $cardNo;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return UserShort
     */
    public function getUserProfile()
    {
        return $this->userProfile;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return float
     */
    public function getMinBalance()
    {
        return $this->minBalance;
    }

    /**
     * @return float
     */
    public function getMaxBalance()
    {
        return $this->maxBalance;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return DeliveryAgentStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * @return string
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }
}
