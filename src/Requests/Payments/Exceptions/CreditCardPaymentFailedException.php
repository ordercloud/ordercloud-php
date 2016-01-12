<?php namespace Ordercloud\Requests\Payments\Exceptions;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

class CreditCardPaymentFailedException extends OrdercloudRequestException
{
    /**
     * @var int
     */
    private $paymentStatusCode;
    /**
     * @var string
     */
    private $paymentStatus;
    /**
     * @var string
     */
    private $resultCode;
    /**
     * @var int
     */
    private $orderId;
    /**
     * @var string
     */
    private $paymentGatewayCode;
    /**
     * @var string
     */
    private $paymentGatewayReference;
    /**
     * @var string
     */
    private $threeDSecureUrl;
    /**
     * @var string
     */
    private $resultMessage;
    /**
     * @var string
     */
    private $displayMessage;

    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $response = $httpException->getResponse();
        $this->paymentStatusCode = $response->getData('paymentStatusCode');
        $this->paymentStatus = $response->getData('paymentStatus');
        $this->resultCode = $response->getData('resultCode');
        $this->orderId = $response->getData('orderId');
        $this->paymentGatewayCode = $response->getData('paymentGatewayCode');
        $this->paymentGatewayReference = $response->getData('paymentGatewayReference');
        $this->threeDSecureUrl = $response->getData('threeDSecureUrl');
        $this->resultMessage = $response->getData('resultMessage');
        $this->displayMessage = $response->getData('displayMessage');
    }

    /**
     * @return int
     */
    public function getPaymentStatusCode()
    {
        return $this->paymentStatusCode;
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
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getPaymentGatewayCode()
    {
        return $this->paymentGatewayCode;
    }

    /**
     * @return string
     */
    public function getPaymentGatewayReference()
    {
        return $this->paymentGatewayReference;
    }

    /**
     * @return string
     */
    public function getThreeDSecureUrl()
    {
        return $this->threeDSecureUrl;
    }

    /**
     * @return string
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    /**
     * @return string
     */
    public function getDisplayMessage()
    {
        return $this->displayMessage;
    }
}
