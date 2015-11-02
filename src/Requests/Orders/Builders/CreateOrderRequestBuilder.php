<?php namespace Ordercloud\Requests\Orders\Builders;

use Ordercloud\Requests\Orders\CreateOrderRequest;

class CreateOrderRequestBuilder
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
    /** @var int */
    private $tip;
    /** @var int */
    private $deliveryServiceId;
    /** @var int */
    private $orderSourceChannelId;
    /** @var string */
    private $deliveryTime;

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @return CreateOrderRequest
     */
    public function getRequest()
    {
        return new CreateOrderRequest(
            $this->userId,
            $this->organisationId,
            $this->items,
            $this->amount,
            $this->paymentStatus,
            $this->deliveryType,
            $this->deliveryAddressId,
            $this->note,
            $this->tip,
            $this->deliveryServiceId,
            $this->orderSourceChannelId,
            $this->deliveryTime
        );
    }

    /**
     * @param int $userId
     *
     * @return static
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param int $organisationId
     *
     * @return static
     */
    public function setOrganisationId($organisationId)
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    /**
     * @param array|NewOrderItem[] $items
     *
     * @return static
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param float|string $amount
     *
     * @return static
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $paymentStatus
     *
     * @return static
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * @param string $deliveryType
     *
     * @return static
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;

        return $this;
    }

    /**
     * @param int $deliveryAddressId
     *
     * @return static
     */
    public function setDeliveryAddressId($deliveryAddressId)
    {
        $this->deliveryAddressId = $deliveryAddressId;

        return $this;
    }

    /**
     * @param string $note
     *
     * @return static
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @param int $tip
     *
     * @return static
     */
    public function setTip($tip)
    {
        $this->tip = $tip;

        return $this;
    }

    /**
     * @param int $deliveryServiceId
     *
     * @return static
     */
    public function setDeliveryServiceId($deliveryServiceId)
    {
        $this->deliveryServiceId = $deliveryServiceId;

        return $this;
    }

    /**
     * @param int $orderSourceChannelId
     *
     * @return static
     */
    public function setOrderSourceChannelId($orderSourceChannelId)
    {
        $this->orderSourceChannelId = $orderSourceChannelId;

        return $this;
    }

    /**
     * @param string $deliveryTime
     *
     * @return static
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }
}
