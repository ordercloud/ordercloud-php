<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Payments\CreateCashOnDeliveryPaymentRequest;

class CreateCashOnDeliveryPaymentRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateCashOnDeliveryPaymentRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/orders/%d/pay/cod', $request->getOrderId())
             ->setParameter('amt', $request->getAmount());
    }

    protected function transformResponse($response)
    {
        return $response;
    }
}
