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
            ->setQueryParameters([
                'email' => $request->getEmailAddress(),
                'mobile' => $request->getMobileNumber()
            ])
            ->setEntityArrayClass('Ordercloud\Entities\Users\User');
    }
}
