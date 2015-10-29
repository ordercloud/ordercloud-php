<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\OrderCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Orders\GetUserOrdersRequest;
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
        $criteria = $request->getCriteria();

        $this->setUrl('resource/orders/user/%d', $request->getUserId())
            ->setQueryParameters([
                'page'          => $criteria->getPage(),
                'pagesize'      => $criteria->getPageSize(),
                'orderstatus'   => $criteria->getOrderStatuses(),
                'paymentstatus' => $criteria->getPaymentStatuses(),
                'sort'          => $criteria->getSort(),
            ]);

        $this->page = $criteria->getPage();
        $this->pageSize = $criteria->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new OrderCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Orders\Order', $response->getData('results')),
            $response->getData('count'),
            $this->page,
            $this->pageSize
        );
    }
}
