<?php namespace Ordercloud\Entities\Payments;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Users\DisplayUser;

class Payment implements JsonSerializable
{
    const PAYMENT_GATEWAY_MYGATE_ZA = "MYGATE_ZA";
    const PAYMENT_GATEWAY_PAYU_ZA = "PAYU_ZA";

    /** @var integer */
    private $id;
    /** @var PaymentStatus */
    private $lastPaymentStatus;
    /** @var string */
    private $gatewayTransactionId;
    /** @var string */
    private $requestId;
    /** @var DisplayUser */
    private $requestedByUser;
    /** @var OrganisationShort */
    private $requestedByOrganisation;
    /** @var string */
    private $assetTypeCode;
    /** @var float */
    private $amount;
    /** @var string */
    private $paymentMethod;
    /** @var string */
    private $gateway;
    /** @var integer */
    private $grouping;
    /**
     * @var string
     */
    private $creationDate;

    public function __construct($id, PaymentStatus $lastPaymentStatus, $gatewayTransactionId, $requestId, DisplayUser $requestedByUser, OrganisationShort $requestedByOrganisation, $assetTypeCode, $amount, $paymentMethod, $gateway, $grouping, $creationDate)
    {
        $this->id = $id;
        $this->lastPaymentStatus = $lastPaymentStatus;
        $this->gatewayTransactionId = $gatewayTransactionId;
        $this->requestId = $requestId;
        $this->requestedByUser = $requestedByUser;
        $this->requestedByOrganisation = $requestedByOrganisation;
        $this->assetTypeCode = $assetTypeCode;
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
        $this->gateway = $gateway;
        $this->grouping = $grouping;
        $this->creationDate = $creationDate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return PaymentStatus
     */
    public function getLastPaymentStatus()
    {
        return $this->lastPaymentStatus;
    }

    /**
     * @return string
     */
    public function getGatewayTransactionId()
    {
        return $this->gatewayTransactionId;
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return DisplayUser
     */
    public function getRequestedByUser()
    {
        return $this->requestedByUser;
    }

    /**
     * @return OrganisationShort
     */
    public function getRequestedByOrganisation()
    {
        return $this->requestedByOrganisation;
    }

    /**
     * @return string
     */
    public function getAssetTypeCode()
    {
        return $this->assetTypeCode;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @return int
     */
    public function getGrouping()
    {
        return $this->grouping;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'lastPaymentStatus' => $this->getLastPaymentStatus(),
            'gatewayTransactionId' => $this->getGatewayTransactionId(),
            'requestId' => $this->getRequestId(),
            'requestedByUser' => $this->getRequestedByUser(),
            'requestedByOrganisation' => $this->getRequestedByOrganisation(),
            'assetTypeCode' => $this->getAssetTypeCode(),
            'amount' => $this->getAmount(),
            'paymentMethod' => $this->getPaymentMethod(),
            'gateway' => $this->getGateway(),
            'grouping' => $this->getGrouping(),
            'creationDate' => $this->getCreationDate(),
        ];
    }
}
