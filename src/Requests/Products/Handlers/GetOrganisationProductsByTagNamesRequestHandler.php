<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetOrganisationProductsByTagNamesRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\PaginatedCollection;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrganisationProductsByTagNamesRequestHandler extends AbstractPutRequestHandler
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
     * @param GetOrganisationProductsByTagNamesRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/criteria?page=%d&pagesize=%d', $request->getPage(), $request->getPageSize())
            ->setParameters([
                'organisations' => $request->getOrganisationIDs(),
                'tags'          => $request->getTagNames(),
            ])
            ->setEntityArrayClass('Ordercloud\Entities\Products\Product');

        $this->page = $request->getPage();
        $this->pageSize = $request->getPageSize();
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
