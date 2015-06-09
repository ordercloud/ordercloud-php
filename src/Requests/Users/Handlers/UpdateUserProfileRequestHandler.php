<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\UpdateUserProfileRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class UpdateUserProfileRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param UpdateUserProfileRequest $request
     *
     * @return UserProfile
     */
    public function handle($request)
    {
        $userID = $request->getUserID();
        $profile = $request->getProfile();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_PUT, "resource/users/{$userID}/profile", [
                    'firstName'       => $profile->getFirstName(),
                    'surname'         => $profile->getSurname(),
                    'nickName'        => $profile->getNickName(),
                    'email'           => $profile->getEmail(),
                    'cellphoneNumber' => $profile->getCellphoneNumber(),
                    'sex'             => $profile->getSex(),
                    'access_token'    => $request->getAccessToken()
                ]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Users\UserProfile', $response->getData());
    }
}
