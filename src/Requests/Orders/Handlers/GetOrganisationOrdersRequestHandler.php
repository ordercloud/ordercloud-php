<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\OrderCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Orders\GetOrganisationOrdersRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrganisationOrdersRequestHandler extends AbstractGetRequestHandler
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
     * @param GetOrganisationOrdersRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();

        $this->setUrl('resource/orders/organisation/%d', $request->getOrganisationId())
            ->setQueryParameters([
                'page'          => $criteria->getPage(),
                'pagesize'      => $criteria->getPageSize(),
                'orderstatus'   => $criteria->getOrderStatuses(),
                'paymentstatus' => $criteria->getPaymentStatuses(),
                'sort'          => $criteria->getSort(),
                'fromDate'      => $criteria->getFromDate(),
                'toDate'        => $criteria->getToDate(),
            ]);

        if ($orderHash = $request->getCriteria()->getOrderHash()) {
            $this->setHeader('orders-hash', $orderHash);
        }

        $this->page = $criteria->getPage();
        $this->pageSize = $criteria->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new OrderCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Orders\Order', $response->getData('results', [])),
            $response->getData('count', 0),
            $this->page,
            $this->pageSize
        );
    }
}
