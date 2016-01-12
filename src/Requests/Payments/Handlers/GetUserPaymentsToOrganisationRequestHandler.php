<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Entities\Payments\PaymentCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Payments\GetUserPaymentsToOrganisationRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserPaymentsToOrganisationRequestHandler extends AbstractGetRequestHandler
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
     * @param GetUserPaymentsToOrganisationRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();

        $this->setUrl('/resource/payments/user/%d/organisation/%d', $request->getUserId(), $request->getOrganisationId())
            ->setQueryParameters([
                'from'     => $criteria->getFrom(),
                'to'       => $criteria->getTo(),
                'page'     => $criteria->getPage(),
                'pagesize' => $criteria->getPageSize(),
            ])
            ->setEntityArrayClass('Ordercloud\Entities\Payments\Payment');

        $this->page = $criteria->getPage();
        $this->pageSize = $criteria->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new PaymentCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Payments\Payment', $response->getData('results')),
            $response->getData('count'),
            $this->page,
            $this->pageSize
        );
    }
}
