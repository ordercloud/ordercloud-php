<?php namespace Ordercloud\Orders;

use Ordercloud\Delivery\DeliveryAgent;
use Ordercloud\Organisations\OrganisationShort;
use Ordercloud\Payments\Payment;
use Ordercloud\Payments\PaymentStatus;
use Ordercloud\Users\UserAddress;
use Ordercloud\Users\UserShort;

class Order
{
    /** @var integer */
    private $id;
    /** @var string */
    private $reference;
    /** @var string */
    private $shortReference;
    /** @var string */
    private $dateCreated;
    /** @var string */
    private $lastUpdated;
    /** @var float */
    private $amount;
    /** @var OrderStatus */
    private $status;
    /** @var array|OrderItem[] */
    private $items;
    /** @var UserShort */
    private $user;
    /** @var UserAddress */
    private $userAddress;
    /** @var OrganisationShort */
    private $organisation;
    /** @var PaymentStatus */
    private $paymentStatus;
    /** @var array|Payment[] */
    private $payments;
    /** @var array|string[] */
    private $paymentMethods;
    /** @var string */
    private $deliveryType;
    /** @var DeliveryAgent */
    private $deliveryAgent;
    /** @var string */
    private $note;
    /** @var boolean */
    private $instorePaymentRequired;

    function __construct($id, $reference, $shortReference, $dateCreated, $lastUpdated, $amount, OrderStatus $status, array $items, UserShort $user, UserAddress $userAddress, OrganisationShort $organisation, PaymentStatus $paymentStatus, array $payments, array $paymentMethods, $deliveryType, DeliveryAgent $deliveryAgent, $note, $instorePaymentRequired)
    {
        $this->id = $id;
        $this->reference = $reference;
        $this->shortReference = $shortReference;
        $this->dateCreated = $dateCreated;
        $this->lastUpdated = $lastUpdated;
        $this->amount = $amount;
        $this->status = $status;
        $this->items = $items;
        $this->user = $user;
        $this->userAddress = $userAddress;
        $this->organisation = $organisation;
        $this->paymentStatus = $paymentStatus;
        $this->payments = $payments;
        $this->paymentMethods = $paymentMethods;
        $this->deliveryType = $deliveryType;
        $this->deliveryAgent = $deliveryAgent;
        $this->note = $note;
        $this->instorePaymentRequired = $instorePaymentRequired;
    }
}
