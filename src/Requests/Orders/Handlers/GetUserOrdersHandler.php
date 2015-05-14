<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\GetUserOrders;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetUserOrdersHandler implements CommandHandler
{
    /** @var Parser */
    private $parser;
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->parser = $parser;
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetUserOrders $request
     *
     * @return array|Order[]
     */
    public function handle($request)
    {
        $userID = $request->getUserID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/orders/user/{$userID}",
                [ 'access_token' => $accessToken ]
            )
        );

        return $this->parser->parseOrders($response->getData('results'));
    }
}
