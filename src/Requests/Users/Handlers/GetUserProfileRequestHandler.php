<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserProfileRequest;

class GetUserProfileRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserProfileRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/%d/profile', $request->getUserID())
            ->setEntityClass('Ordercloud\Entities\Users\UserProfile');
    }
}
