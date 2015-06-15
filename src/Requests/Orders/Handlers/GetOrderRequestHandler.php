<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Orders\GetOrderRequest;

class GetOrderRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrderRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/orders/%d', $request->getOrderID())
            ->setEntityClass('Ordercloud\Entities\Orders\Order');
    }
}
