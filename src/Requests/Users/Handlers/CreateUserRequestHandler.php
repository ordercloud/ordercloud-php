<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Users\CreateUserRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateUserRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateUserRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users')
            ->setBodyParameters([
                'firstName'           => $request->getProfile()->getFirstName(),
                'surname'             => $request->getProfile()->getSurname(),
                'email'               => $request->getProfile()->getEmail(),
                'nickName'            => $request->getProfile()->getNickName(),
                'cellphoneNumber'     => $request->getProfile()->getCellphoneNumber(),
                'sex'                 => $request->getProfile()->getSex(),
                'mobileNumberCountry' => $request->getMobileNumberCountry(),
                'username'            => $request->getProfile()->getEmail(),
                'password'            => $request->getPassword(),
                'sendWelcomeMessage'  => $request->isSendWelcomeMessage(),
                'groupIds'            => $request->getGroupIds(),
            ]);
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
