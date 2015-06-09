<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Requests\Payments\Entities\CreditCard;
use Ordercloud\Support\CommandBus\Command;

class CreateCreditCardPaymentRequest implements Command
{
    /** @var string */
    private $paymentGateway;
    /** @var float */
    private $amount;
    /** @var CreditCard */
    private $card;
    /** @var int */
    private $orderID;
    /** @var string */
    private $budgetPeriod;
    /** @var string|null */
    private $accessToken;

    public function __construct($paymentGateway, $amount, CreditCard $card, $orderID, $budgetPeriod = '0', $accessToken = null)
    {
        $this->paymentGateway = $paymentGateway;
        $this->amount = $amount;
        $this->card = $card;
        $this->budgetPeriod = $budgetPeriod ?: '0';
        $this->accessToken = $accessToken;
        $this->orderID = $orderID;
    }

    /**
     * @return string
     */
    public function getPaymentGateway()
    {
        return $this->paymentGateway;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return CreditCard
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return int
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getBudgetPeriod()
    {
        return $this->budgetPeriod;
    }

    /**
     * @return null|string
     */
    public function getOrderRef()
    {
        return $this->orderRef;
    }

    /**
     * @return null|string
     */
    public function getDestinationRef()
    {
        return $this->destinationRef;
    }

    /**
     * @return boolean
     */
    public function isTestMode()
    {
        return $this->testMode;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
