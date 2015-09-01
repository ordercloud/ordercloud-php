<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\FindUserRequest;

class FindUserRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param FindUserRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/search')
            ->setParameters([
                'email' => $request->getEmailAddress(),
                'mobile' => $request->getMobileNumber()
            ])
            ->setEntityClass('Ordercloud\Entities\Users\User');
    }
}
