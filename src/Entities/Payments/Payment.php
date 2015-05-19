<?php namespace Ordercloud\Entities\Payments;

use Ordercloud\Entities\Organisations\Organisation;
use Ordercloud\Entities\Users\DisplayUser;

class Payment
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
    /** @var Organisation */
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

    function __construct($id, PaymentStatus $lastPaymentStatus, $gatewayTransactionId, $requestId, DisplayUser $requestedByUser, Organisation $requestedByOrganisation, $assetTypeCode, $amount, $paymentMethod, $gateway, $grouping)
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
     * @return Organisation
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
}
