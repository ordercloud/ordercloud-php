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
    private $currencyCode;
    /** @var float */
    private $amount;
    /** @var string */
    private $paymentMethod;
    /** @var string */
    private $gateway;
    /**
     * @var string
     */
    private $creationDate;

    public function __construct($id, PaymentStatus $lastPaymentStatus, $gatewayTransactionId, $requestId, DisplayUser $requestedByUser, OrganisationShort $requestedByOrganisation, $currencyCode, $amount, $paymentMethod, $gateway, $creationDate)
    {
        $this->id = $id;
        $this->lastPaymentStatus = $lastPaymentStatus;
        $this->gatewayTransactionId = $gatewayTransactionId;
        $this->requestId = $requestId;
        $this->requestedByUser = $requestedByUser;
        $this->requestedByOrganisation = $requestedByOrganisation;
        $this->currencyCode = $currencyCode;
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
        $this->gateway = $gateway;
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
    public function getCurrencyCode()
    {
        return $this->currencyCode;
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
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'lastPaymentStatus' => $this->getLastPaymentStatus(),
            'gatewayTransactionId' => $this->getGatewayTransactionId(),
            'requestId' => $this->getRequestId(),
            'requestedByUser' => $this->getRequestedByUser(),
            'requestedByOrganisation' => $this->getRequestedByOrganisation(),
            'currencyCode' => $this->getCurrencyCode(),
            'amount' => $this->getAmount(),
            'paymentMethod' => $this->getPaymentMethod(),
            'gateway' => $this->getGateway(),
            'creationDate' => $this->getCreationDate(),
        ];
    }
}
