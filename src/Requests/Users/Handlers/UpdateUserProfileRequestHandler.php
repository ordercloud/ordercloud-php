<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Users\UpdateUserProfileRequest;

class UpdateUserProfileRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param UpdateUserProfileRequest $request
     */
    protected function configure($request)
    {
        $profile = $request->getProfile();

        $this->setUrl('resource/users/%d/profile', $request->getUserID())
            ->setBodyParameters([
                'firstName'       => $profile->getFirstName(),
                'surname'         => $profile->getSurname(),
                'nickName'        => $profile->getNickName(),
                'email'           => $profile->getEmail(),
                'cellphoneNumber' => $profile->getCellphoneNumber(),
                'sex'             => $profile->getSex(),
            ])
            ->setEntityClass('Ordercloud\Entities\Users\UserProfile');
    }
}
