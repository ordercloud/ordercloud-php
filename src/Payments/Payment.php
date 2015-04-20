<?php namespace Ordercloud\Payments;

use Ordercloud\Organisations\Organisation;
use Ordercloud\Users\DisplayUser;

class Payment
{
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
}
