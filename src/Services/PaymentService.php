<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Payments\ThreeDSecure;
use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Payments\CreateCashOnDeliveryPaymentRequest;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;
use Ordercloud\Requests\Payments\Entities\CreditCard;
use Ordercloud\Requests\Payments\Exceptions\CreditCardPaymentFailedException;
use Ordercloud\Requests\Payments\GetPaymentThreeDSecureRequest;

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
     * @param bool       $threeDSecure
     */
    public function createCreditCardPayment($paymentGateway, CreditCard $card, $orderID, $budgetPeriod = '0', $threeDSecure = false)
    {
        $this->request(
            new CreateCreditCardPaymentRequest($paymentGateway, $card, $orderID, $budgetPeriod, $threeDSecure)
        );
    }

    /**
     * @param int $paymentId
     *
     * @return ThreeDSecure
     */
    public function getPaymentThreeDSecure($paymentId)
    {
        return $this->request(
            new GetPaymentThreeDSecureRequest($paymentId)
        );
    }
}
