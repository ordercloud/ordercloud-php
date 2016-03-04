<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\ProductTagCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Products\GetProductTagsRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetProductTagsRequestHandler extends AbstractGetRequestHandler
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
     * @param GetProductTagsRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();
        $organisation = null;
        $type = null;

        if ($organisationId = $criteria->getOrganisationId()) {
            $organisation = "/organisation/{$organisationId}";
        }

        if ($type = $criteria->getTypeId()) {
            $type = "/type/{$type}";
        }
        else if ($type = $criteria->getTypeName()) {
            $type = "/type/{$type}";
        }

        $this->setUrl('resource/product/tag%s%s', $organisation, $type)
            ->setQueryParameters([
                'page'     => $criteria->getPage(),
                'pagesize' => $criteria->getPageSize(),
            ]);

        $this->page = $criteria->getPage();
        $this->pageSize = $criteria->getPageSize();
    }

    protected function transformResponse($response)
    {
        return new ProductTagCollection(
            EntityReflector::parseAll('Ordercloud\Entities\Products\ProductTag', $response->getData('results')),
            $response->getData('count'),
            $this->page,
            $this->pageSize
        );
    }
}
