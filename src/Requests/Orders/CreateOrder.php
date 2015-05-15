<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Requests\Orders\Entities\NewOrderItem;
use Ordercloud\Support\CommandBus\Command;

class CreateOrder implements Command
{
    /** @var int */
    private $userID;
    /** @var int */
    private $organisationID;
    /** @var array|NewOrderItem[] */
    private $items;
    /** @var string|float */
    private $amount;
    /** @var string */
    private $paymentStatus;
    /** @var string */
    private $deliveryType;
    /** @var int|null */
    private $deliveryAddressID;
    /** @var string|null */
    private $note;
    /** @var string|null */
    private $accessToken;

    public function __construct($userID, $organisationID, array $items, $amount, $paymentStatus, $deliveryType, $deliveryAddressID = null, $note = null, $accessToken = null)
    {
        $this->userID = $userID;
        $this->organisationID = $organisationID;
        $this->items = $items;
        $this->amount = $amount;
        $this->paymentStatus = $paymentStatus;
        $this->deliveryType = $deliveryType;
        $this->deliveryAddressID = $deliveryAddressID;
        $this->note = $note;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
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
    public function getDeliveryAddressID()
    {
        return $this->deliveryAddressID;
    }

    /**
     * @return null|string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
