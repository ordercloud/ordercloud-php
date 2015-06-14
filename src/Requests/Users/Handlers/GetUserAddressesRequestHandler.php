<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserAddressesRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserAddressesRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserAddressesRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("resource/users/%d/geos", $request->getUserID());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseAll('Ordercloud\Entities\Users\UserAddress', $response->getData('results'));
    }
}
