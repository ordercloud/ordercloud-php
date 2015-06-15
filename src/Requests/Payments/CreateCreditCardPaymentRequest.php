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

    public function __construct($paymentGateway, $amount, CreditCard $card, $orderID, $budgetPeriod = '0')
    {
        $this->paymentGateway = $paymentGateway;
        $this->amount = $amount;
        $this->card = $card;
        $this->budgetPeriod = $budgetPeriod ?: '0';
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
     * @return string
     */
    public function getBudgetPeriod()
    {
        return $this->budgetPeriod;
    }
}
