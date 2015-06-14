<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserProfileRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserProfileRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserProfileRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("resource/users/%d/profile", $request->getUserID());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Users\UserProfile', $response->getData());
    }
}
