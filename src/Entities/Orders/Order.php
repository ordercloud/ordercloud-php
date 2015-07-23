<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Delivery\DeliveryAgent;
use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Payments\Payment;
use Ordercloud\Entities\Payments\PaymentStatus;
use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Entities\Users\UserShort;

class Order
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
    /** @var PaymentStatus */
    private $paymentStatus;
    /**
     * @var array|Payment[]
     * @reflectType \Ordercloud\Entities\Payments\Payment
     */
    private $payments;
    /**
     * @var array|string[]
     * @reflectName paymentMethod
     */
    private $paymentMethods;
    /** @var string */
    private $deliveryType;
    /** @var DeliveryAgent */
    private $deliveryAgent;
    /** @var string */
    private $note;
    /** @var boolean */
    private $instorePaymentRequired;
    /** @var string */
    private $estimatedDeliveryTime;

    public function __construct($id, $reference, $shortReference, $dateCreated, $lastUpdated, $amount, OrderStatus $status, array $items, UserShort $user, UserAddress $userAddress = null, OrganisationShort $organisation, PaymentStatus $paymentStatus, array $payments, array $paymentMethods, $deliveryType, DeliveryAgent $deliveryAgent = null, $note, $instorePaymentRequired, $estimatedDeliveryTime)
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
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;
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
     * @return PaymentStatus
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
     * @return boolean
     */
    public function isInstorePaymentRequired()
    {
        return $this->instorePaymentRequired;
    }

    /**
     * @return string
     */
    public function getEstimatedDeliveryTime()
    {
        return $this->estimatedDeliveryTime;
    }
}
