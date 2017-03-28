<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Delivery\DeliveryAgent;
use Ordercloud\Entities\OrderDiscount\OrderDiscount;
use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Payments\Payment;
use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Entities\Users\UserShort;

class Order implements JsonSerializable
{
    const DELIVERY_TYPE_SELFPICKUP = 'SELFPICKUP';
    const DELIVERY_TYPE_DELIVERY = 'DELIVERY';

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
    /**
     * @var array|OrderItem[]
     * @reflectType Ordercloud\Entities\Orders\OrderItem
     */
    private $items;
    /** @var UserShort */
    private $user;
    /**
     * @var UserAddress
     * @reflectName userGeo
     */
    private $userAddress;
    /** @var OrganisationShort */
    private $organisation;
    /** @var OrderPaymentStatus */
    private $paymentStatus;
    /**
     * @var array|Payment[]
     * @reflectType \Ordercloud\Entities\Payments\Payment
     */
    private $payments;
    /**
     * @var array|string[]
     */
    private $paymentMethods;
    /** @var string */
    private $deliveryType;
    /** @var DeliveryAgent */
    private $deliveryAgent;
    /** @var string */
    private $note;
    /** @var string */
    private $estimatedDeliveryTime;
    /** @var float */
    private $deliveryCost;
    /**
     * @var OrderSourceChannel
     */
    private $orderSourceChannel;
    /**
     * @var string
     */
    private $scheduledDate;
    /**
     * @var float
     */
    private $tip;
    /**
     * @var null|OrderDelivery
     */
    private $delivery;
    /**
     * @var float
     */
    private $adminFee;
    
    /**
     * @var array|orderDiscount
     * @reflectType Ordercloud\Entities\Orders\OrderDiscount
     */
    private $orderDiscount;

    //TODO add: delivery + statusHistory
    public function __construct(
        $id,
        $reference,
        $shortReference,
        $dateCreated,
        $lastUpdated,
        $amount,
        OrderStatus $status,
        array $items,
        UserShort $user,
        UserAddress $userAddress = null,
        OrganisationShort $organisation,
        OrderPaymentStatus $paymentStatus,
        array $payments,
        array $paymentMethods,
        $deliveryType,
        DeliveryAgent $deliveryAgent = null,
        $note,
        $estimatedDeliveryTime,
        $deliveryCost,
        OrderSourceChannel $orderSourceChannel = null,
        $scheduledDate = null,
        $tip,
        OrderDelivery $delivery = null,
        OrderDiscount $orderDiscount = null,
        $adminFee = 0
    )
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
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;
        $this->deliveryCost = $deliveryCost;
        $this->orderSourceChannel = $orderSourceChannel;
        $this->scheduledDate = $scheduledDate;
        $this->tip = $tip;
        $this->delivery = $delivery;
        $this->adminFee = $adminFee;
        $this->orderDiscount = $orderDiscount;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getShortReference()
    {
        return $this->shortReference;
    }

    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return string
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return OrderStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return bool
     */
    public function isStatus($status)
    {
        return strcasecmp($this->getStatus(), $status) === 0;
    }

    /**
     * @return array|OrderItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Returns all order items grouped by merchant
     *
     * @return array|MerchantItems[]
     */
    public function getMerchantItems()
    {
        return MerchantItems::createFromOrder($this);
    }

    /**
     * @return UserShort
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return UserAddress
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return OrderPaymentStatus
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @return array|\Ordercloud\Entities\Payments\Payment[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @return array|string[]
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * @return bool
     */
    public function hasPaymentMethods()
    {
        return ! empty($this->paymentMethods);
    }

    /**
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @param string $deliveryType
     *
     * @return bool
     */
    public function isDeliveryType($deliveryType)
    {
        return strcasecmp($this->getDeliveryType(), $deliveryType) === 0;
    }

    /**
     * @return DeliveryAgent
     */
    public function getDeliveryAgent()
    {
        return $this->deliveryAgent;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return string
     */
    public function getEstimatedDeliveryTime()
    {
        return $this->estimatedDeliveryTime;
    }

    /**
     * @return float
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * @return OrderSourceChannel
     */
    public function getOrderSourceChannel()
    {
        return $this->orderSourceChannel;
    }

    /**
     * @return string
     */
    public function getScheduledDate()
    {
        return $this->scheduledDate;
    }

    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @return null|OrderDelivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return null|OrderDiscount
     */
    public function getOrderDiscount()
    {
        return $this->orderDiscount;
    }

    /**
     * @return float
     */
    public function getAdminFee()
    {
        return $this->adminFee;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'reference' => $this->getReference(),
            'shortReference' => $this->getShortReference(),
            'dateCreated' => $this->getDateCreated(),
            'lastUpdated' => $this->getLastUpdated(),
            'amount' => $this->getAmount(),
            'status' => $this->getStatus(),
            'items' => $this->getItems(),
            'user' => $this->getUser(),
            'userGeo' => $this->getUserAddress(),
            'organisation' => $this->getOrganisation(),
            'paymentStatus' => $this->getPaymentStatus(),
            'payments' => $this->getPayments(),
            'paymentMethod' => $this->getPaymentMethods(),
            'deliveryType' => $this->getDeliveryType(),
            'deliveryAgent' => $this->getDeliveryAgent(),
            'delivery' => $this->getDelivery(),
            'note' => $this->getNote(),
            'estimatedDeliveryTime' => $this->getEstimatedDeliveryTime(),
            'deliveryCost' => $this->getDeliveryCost(),
            'orderSourceChannel' => $this->getOrderSourceChannel(),
            'scheduledDate' => $this->getScheduledDate(),
            'tip' => $this->getTip(),
            'adminFee' => $this->getAdminFee(),
            $this->orderDiscount => $this->getOrderDiscount(),
        ];
    }
}
