<?php namespace Ordercloud\Entities\Delivery;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Users\UserShort;

class DeliveryAgent implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var UserShort */
    private $user;
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

    public function __construct($id, UserShort $user, OrganisationShort $organisation, $minBalance, $maxBalance, $enabled, DeliveryAgentStatus $status, $accountNo, $cardNo)
    {
        $this->id = $id;
        $this->user = $user;
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
    public function getUser()
    {
        return $this->user;
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

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'user' => $this->getUser(),
            'organisation' => $this->getOrganisation(),
            'minBalance' => $this->getMinBalance(),
            'maxBalance' => $this->getMaxBalance(),
            'enabled' => $this->isEnabled(),
            'status' => $this->getStatus(),
            'accountNo' => $this->getAccountNo(),
            'cardNo' => $this->getCardNo(),
        ];
    }
}
