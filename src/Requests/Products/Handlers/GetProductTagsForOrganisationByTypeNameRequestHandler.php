<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\ProductTag;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetProductTagsForOrganisationByTypeNameRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetProductTagsForOrganisationByTypeNameRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetProductTagsForOrganisationByTypeNameRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("/resource/product/tag/organisation/%s/type/%s", $request->getOrganisationID(), $request->getTagName());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseAll('Ordercloud\Entities\Products\ProductTag', $response->getData('results'));
    }
}
