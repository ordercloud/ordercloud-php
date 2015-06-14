<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetLoggedInUserRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetLoggedInUserRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetLoggedInUserRequest $request
     */
    protected function configure($request)
    {
        $this->url = 'resource/users/logged_in';
        $this->headers = [
            'Authorization' => $request->getAuthHeader()
        ];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Users\User', $response->getData());
    }
}
