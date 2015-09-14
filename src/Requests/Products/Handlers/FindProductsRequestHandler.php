<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Handlers\FormatBooleanTrait;
use Ordercloud\Requests\Products\FindProductsRequest;
use Ordercloud\Support\PaginatedCollection;
use Ordercloud\Support\Reflection\EntityReflector;

class FindProductsRequestHandler extends AbstractPutRequestHandler
{
    use FormatBooleanTrait;

    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $pageSize;

    /**
     * @param FindProductsRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();

        $this->setUrl('resource/product/criteria?page=%d&pagesize=%d', $criteria->getPage(), $criteria->getPageSize())
             ->setParameters([
                 'tags'          => $criteria->getTags(),
                 'available'     => $this->formatBoolean($criteria->isAvailable()),
                 'order'         => $criteria->getOrders(),
                 'organisations' => $criteria->getOrganisations(),
                 'search'        => $criteria->getSearch(),
             ])
             ->setEntityArrayClass('Ordercloud\Entities\Products\Product');

        $this->page = $criteria->getPage();
        $this->pageSize = $criteria->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new PaginatedCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Products\Product', $response->getData('results')),
            $response->getData('count'),
            $this->page,
            $this->pageSize
        );
    }
}
