<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Payments\CreateCashOnDeliveryPaymentRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateCashOnDeliveryPaymentRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateCashOnDeliveryPaymentRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/orders/%d/pay/cod', $request->getOrderId());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
