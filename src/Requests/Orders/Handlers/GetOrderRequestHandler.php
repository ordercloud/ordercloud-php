<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\GetOrderRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrderRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetOrderRequest $request
     *
     * @return Order
     */
    public function handle($request)
    {
        $orderID = $request->getOrderID();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/orders/{$orderID}",
                ['access_token' => $request->getAccessToken()]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Orders\Order', $response->getData());
    }
}
