<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\GetUserOrders;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\PaginatedCollection;
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

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/orders/user/{$userID}",
                [
                    'page'          => $request->getPage(),
                    'pagesize'      => $request->getPageSize(),
                    'orderstatus'   => $request->getOrderStatuses(),
                    'paymentstatus' => $request->getPaymentStatuses(),
                    'sort'          => $request->getSort(),
                    'access_token'  => $request->getAccessToken(),
                ]
            )
        );

        return new PaginatedCollection(
            $this->parser->parseOrders($response->getData('results')),
            $response->getData('count'),
            $request->getPage(),
            $request->getPageSize()
        );
    }
}
