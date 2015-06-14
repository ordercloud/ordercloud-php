<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserByIdRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserByIdRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserByIdRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("resource/users/%d", $request->getUserID());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Users\User', $response->getData());
    }
}
