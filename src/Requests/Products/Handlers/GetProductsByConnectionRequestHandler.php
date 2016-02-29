<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\ProductCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Handlers\FormatBooleanTrait;
use Ordercloud\Requests\Products\GetProductsByConnectionRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetProductsByConnectionRequestHandler extends AbstractGetRequestHandler
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
     * @param GetProductsByConnectionRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();

        $this->setUrl('/resource/product/connection/%d', $request->getConnectionId())
            ->setQueryParameters([
                'page'         => $criteria->getPage(),
                'pagesize'     => $criteria->getPageSize(),
                'showDisabled' => $this->formatBoolean($criteria->isShowDisabled()),
            ]);

        $this->page = $criteria->getPage();
        $this->pageSize = $criteria->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new ProductCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Products\Product', $response->getData('results')),
            $response->getData('count'),
            $this->page,
            $this->pageSize
        );
    }
}
