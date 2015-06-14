<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Users\UpdateUserProfileRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class UpdateUserProfileRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param UpdateUserProfileRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("resource/users/%d/profile", $request->getUserID());

        $profile = $request->getProfile();
        $this->parameters = [
            'firstName'       => $profile->getFirstName(),
            'surname'         => $profile->getSurname(),
            'nickName'        => $profile->getNickName(),
            'email'           => $profile->getEmail(),
            'cellphoneNumber' => $profile->getCellphoneNumber(),
            'sex'             => $profile->getSex(),
            'access_token'    => $request->getAccessToken()
        ];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Users\UserProfile', $response->getData());
    }
}
