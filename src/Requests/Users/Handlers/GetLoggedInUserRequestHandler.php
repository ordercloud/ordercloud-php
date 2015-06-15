<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetLoggedInUserRequest;

class GetLoggedInUserRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetLoggedInUserRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/logged_in')
            ->setHeader('Authorization', $request->getAuthHeader())
            ->setEntityClass('Ordercloud\Entities\Users\User');
    }
}
