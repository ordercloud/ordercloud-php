<?php namespace Ordercloud\Services;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Payments\CreateCashOnDeliveryPaymentRequest;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;
use Ordercloud\Requests\Payments\Entities\CreditCard;
use Ordercloud\Requests\Payments\Exceptions\CreditCardPaymentFailedException;

class PaymentService extends OrdercloudService
{
    /**
     * @param int $orderId
     *
     * @throws OrdercloudRequestException
     */
    public function createCashOnDeliveryPayment($orderId)
    {
        $this->request(
            new CreateCashOnDeliveryPaymentRequest($orderId)
        );
    }

    /**
     * @param string     $paymentGateway
     * @param CreditCard $card
     * @param int        $orderID
     * @param string     $budgetPeriod
     *
     * @throws CreditCardPaymentFailedException
     * @throws OrdercloudRequestException
     */
    public function createCreditCardPayment($paymentGateway, CreditCard $card, $orderID, $budgetPeriod = '0')
    {
        $this->request(
            new CreateCreditCardPaymentRequest($paymentGateway, $card, $orderID, $budgetPeriod)
        );
    }
}
