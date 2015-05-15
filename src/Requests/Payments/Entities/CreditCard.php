<?php namespace Ordercloud\Requests\Payments\Entities;

class CreditCard
{
    /** @var string */
    private $cardNumber;
    /** @var string */
    private $nameOnCard;
    /** @var string */
    private $expiryMonth;
    /** @var string */
    private $expiryYear;
    /** @var string */
    private $cvv;

    public function __construct($cardNumber, $nameOnCard, $expiryMonth, $expiryYear, $cvv)
    {
        $this->cardNumber = $cardNumber;
        $this->nameOnCard = $nameOnCard;
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
        $this->cvv = $cvv;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @return string
     */
    public function getNameOnCard()
    {
        return $this->nameOnCard;
    }

    /**
     * @return string
     */
    public function getExpiryMonth()
    {
        return $this->expiryMonth;
    }

    /**
     * @return string
     */
    public function getExpiryYear()
    {
        return $this->expiryYear;
    }

    /**
     * @return string
     */
    public function getCvv()
    {
        return $this->cvv;
    }
}
