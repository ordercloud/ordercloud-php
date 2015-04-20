<?php namespace Ordercloud\Delivery;

use Ordercloud\Organisations\OrganisationShort;
use Ordercloud\Users\UserProfile;

class DeliveryAgent
{
    /** @var integer */
    private $id;
    /** @var UserProfile */
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
     * The MASKED account number. Must only show the last 6 digits
     */
    private $accountNo;
    /**
     * @var string
     * The MASKED card number. Must only show the last 4 digits.
     */
    private $cardNo;

    function __construct($id, UserProfile $userProfile, OrganisationShort $organisation, $minBalance, $maxBalance, $enabled, DeliveryAgentStatus $status, $accountNo, $cardNo)
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
}
