<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\GetUserOrdersRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\PaginatedCollection;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserOrdersRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $pageSize;

    /**
     * @param GetUserOrdersRequest $request
     */
    protected function configure($request)
    {
        $this->url = "resource/orders/user/{$request->getUserID()}";

        $this->parameters = [
            'page'          => $request->getPage(),
            'pagesize'      => $request->getPageSize(),
            'orderstatus'   => $request->getOrderStatuses(),
            'paymentstatus' => $request->getPaymentStatuses(),
            'sort'          => $request->getSort(),
            'access_token'  => $request->getAccessToken(),
        ];

        $this->page = $request->getPage();
        $this->pageSize = $request->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new PaginatedCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Orders\Order', $response->getData('results')),
            $response->getData('count'),
            $this->page,
            $this->pageSize
        );
    }
}
