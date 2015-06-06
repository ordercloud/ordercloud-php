<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\GetUserOrdersRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;
use Ordercloud\Support\PaginatedCollection;

class GetUserOrdersRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetUserOrdersRequest $request
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
            EntityReflector::parseAll('Ordercloud\Entities\Orders\Order', $response->getData('results')),
            $response->getData('count'),
            $request->getPage(),
            $request->getPageSize()
        );
    }
}
