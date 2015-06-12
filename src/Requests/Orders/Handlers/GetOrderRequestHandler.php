<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\GetOrderRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrderRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrderRequest $request
     */
    protected function configure($request)
    {
        $this->url = "resource/orders/{$request->getOrderID()}";
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Orders\Order', $response->getData());
    }
}
