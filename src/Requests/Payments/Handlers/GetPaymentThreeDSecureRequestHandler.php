<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Payments\GetPaymentThreeDSecureRequest;

class GetPayment3DSecureRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetPaymentThreeDSecureRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/payment/%d/three_d_secure', $request->getPaymentId())
            ->setEntityClass('Ordercloud\Entities\Payments\ThreeDSecure');
    }
}
