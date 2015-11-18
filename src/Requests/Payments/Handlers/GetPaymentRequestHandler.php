<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Payments\GetPaymentRequest;

class GetPaymentRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetPaymentRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/payments/%d', $request->getPaymentId())
            ->setEntityClass('Ordercloud\Entities\Payments\Payment');
    }
}
