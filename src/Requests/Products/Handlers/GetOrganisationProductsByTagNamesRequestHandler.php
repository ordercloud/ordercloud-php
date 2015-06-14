<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetOrganisationProductsByTagNamesRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrganisationProductsByTagNamesRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param GetOrganisationProductsByTagNamesRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("/resource/product/criteria");
        $this->parameters = [
            'organisations' => $request->getOrganisationIDs(),
            'tags'          => $request->getTagNames(),
            'access_token'  => $request->getAccessToken()
        ];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseAll('Ordercloud\Entities\Products\Product', $response->getData('results'));
    }
}
