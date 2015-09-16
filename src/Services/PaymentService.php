<?php namespace Ordercloud\Services;

use Ordercloud\Requests\Payments\CreateCashOnDeliveryPaymentRequest;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;
use Ordercloud\Requests\Payments\Entities\CreditCard;

class PaymentService extends OrdercloudService
{
    /**
     * @param int   $orderId
     * @param float $amount
     */
    public function createCashOnDeliveryPayment($orderId, $amount)
    {
        $this->request(
            new CreateCashOnDeliveryPaymentRequest($orderId, $amount)
        );
    }

    /**
     * @param string     $paymentGateway
     * @param float      $amount
     * @param CreditCard $card
     * @param int        $orderID
     * @param string     $budgetPeriod
     */
    public function createCreditCardPayment($paymentGateway, $amount, CreditCard $card, $orderID, $budgetPeriod = '0')
    {
        $this->request(
            new CreateCreditCardPaymentRequest($paymentGateway, $amount, $card, $orderID, $budgetPeriod)
        );
    }
}
