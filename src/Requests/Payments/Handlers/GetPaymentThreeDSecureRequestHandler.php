<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Payments\GetPaymentThreeDSecureRequest;

class GetPaymentThreeDSecureRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetPaymentThreeDSecureRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/payments/%d/three_d_secure', $request->getPaymentId())
            ->setEntityClass('Ordercloud\Entities\Payments\ThreeDSecure');
    }
}
