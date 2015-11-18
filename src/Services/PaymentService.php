<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Payments\Payment;
use Ordercloud\Entities\Payments\ThreeDSecure;
use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Payments\CreateCashOnDeliveryPaymentRequest;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;
use Ordercloud\Requests\Payments\Entities\CreditCard;
use Ordercloud\Requests\Payments\GetPaymentRequest;
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
        $this->request(new CreateCashOnDeliveryPaymentRequest($orderId));
    }

    /**
     * @param string     $paymentGateway
     * @param CreditCard $card
     * @param int        $orderID
     * @param string     $budgetPeriod
     * @param bool       $threeDSecure
     * @param string     $threeDSecureReturnUrl
     *
     * @return int
     */
    public function createCreditCardPayment($paymentGateway, CreditCard $card, $orderID, $budgetPeriod = '0', $threeDSecure = false, $threeDSecureReturnUrl = null)
    {
        return $this->request(
            new CreateCreditCardPaymentRequest($paymentGateway, $card, $orderID, $budgetPeriod, $threeDSecure, $threeDSecureReturnUrl)
        );
    }

    /**
     * @param int $paymentId
     *
     * @return ThreeDSecure
     */
    public function getPaymentThreeDSecure($paymentId)
    {
        return $this->request(new GetPaymentThreeDSecureRequest($paymentId));
    }

    /**
     * @param $paymentId
     *
     * @return Payment
     */
    public function getPayment($paymentId)
    {
        return $this->request(new GetPaymentRequest($paymentId));
    }
}
