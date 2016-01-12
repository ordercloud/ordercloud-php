<?php namespace Ordercloud\Requests\Payments;

use Ordercloud\Requests\Payments\Entities\CreditCard;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class CreateCreditCardPaymentRequest
 *
 * @see Ordercloud\Requests\Payments\Handlers\CreateCreditCardPaymentRequestHandler
 */
class CreateCreditCardPaymentRequest implements Command
{
    /** @var string */
    private $paymentGateway;
    /** @var CreditCard */
    private $card;
    /** @var int */
    private $orderID;
    /** @var string */
    private $budgetPeriod;
    /**
     * @var bool
     */
    private $threeDSecure;
    /**
     * @var string
     */
    private $threeDSecureReturnUrl;

    /**
     * @param string     $paymentGateway
     * @param CreditCard $card
     * @param int        $orderID
     * @param string     $budgetPeriod
     * @param bool       $threeDSecure
     * @param string     $threeDSecureReturnUrl
     */
    public function __construct($paymentGateway, CreditCard $card, $orderID, $budgetPeriod = '0', $threeDSecure = false, $threeDSecureReturnUrl = null)
    {
        $this->paymentGateway = $paymentGateway;
        $this->card = $card;
        $this->budgetPeriod = $budgetPeriod ?: '0';
        $this->orderID = $orderID;
        $this->threeDSecure = (bool)$threeDSecure;
        $this->threeDSecureReturnUrl = $threeDSecureReturnUrl;
    }

    /**
     * @return string
     */
    public function getPaymentGateway()
    {
        return $this->paymentGateway;
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

    /**
     * @return boolean
     */
    public function isThreeDSecure()
    {
        return $this->threeDSecure;
    }

    /**
     * @return string
     */
    public function getThreeDSecureReturnUrl()
    {
        return $this->threeDSecureReturnUrl;
    }
}
