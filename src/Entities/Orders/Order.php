<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Delivery\DeliveryAgent;
use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Payments\Payment;
use Ordercloud\Entities\Payments\PaymentStatus;
use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Entities\Users\UserShort;

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
    /** @var \Ordercloud\Entities\Organisations\OrganisationShort */
    private $organisation;
    /** @var \Ordercloud\Entities\Payments\PaymentStatus */
    private $paymentStatus;
    /** @var array|\Ordercloud\Entities\Payments\Payment[] */
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