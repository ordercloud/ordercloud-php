<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserByIdRequest;

class GetUserByIdRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserByIdRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/%d', $request->getUserID())
            ->setEntityClass('Ordercloud\Entities\Users\User');
    }
}
