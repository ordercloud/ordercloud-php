<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Requests\Orders\Entities\NewOrderItem;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class CreateOrderRequest
 *
 * @see Ordercloud\Requests\Orders\Handlers\CreateOrderRequestHandler
 */
class CreateOrderRequest implements Command
{
    /** @var int */
    private $userId;
    /** @var int */
    private $organisationId;
    /** @var array|NewOrderItem[] */
    private $items;
    /** @var string|float */
    private $amount;
    /** @var string */
    private $paymentStatus;
    /** @var string */
    private $deliveryType;
    /** @var int */
    private $deliveryAddressId;
    /** @var string */
    private $note;
    /**
     * @var int
     */
    private $tip;
    /**
     * @var int
     */
    private $deliveryServiceId;
    /**
     * @var int
     */
    private $orderSourceChannelId;
    /**
     * @var string
     */
    private $scheduledTime;
    /**
     * @var float
     */
    private $deliveryCost;

    public function __construct($userId, $organisationId, array $items, $amount, $paymentStatus, $deliveryType, $deliveryAddressId, $note, $tip, $deliveryServiceId, $orderSourceChannelId, $scheduledTime, $deliveryCost)
    {
        $this->userId = $userId;
        $this->organisationId = $organisationId;
        $this->items = $items;
        $this->amount = $amount;
        $this->paymentStatus = $paymentStatus;
        $this->deliveryType = $deliveryType;
        $this->deliveryAddressId = $deliveryAddressId;
        $this->note = $note;
        $this->tip = $tip;
        $this->deliveryServiceId = $deliveryServiceId;
        $this->orderSourceChannelId = $orderSourceChannelId;
        $this->scheduledTime = $scheduledTime;
        $this->deliveryCost = $deliveryCost;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return float|string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @return int|null
     */
    public function getDeliveryAddressId()
    {
        return $this->deliveryAddressId;
    }

    /**
     * @return null|string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return int
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @return int
     */
    public function getDeliveryServiceId()
    {
        return $this->deliveryServiceId;
    }

    /**
     * @return int
     */
    public function getOrderSourceChannelId()
    {
        return $this->orderSourceChannelId;
    }

    /**
     * @return string
     */
    public function getScheduledTime()
    {
        return $this->scheduledTime;
    }

    /**
     * @return float
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }
}
