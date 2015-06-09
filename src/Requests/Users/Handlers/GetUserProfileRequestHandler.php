<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetUserProfileRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserProfileRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetUserProfileRequest $request
     *
     * @return array|UserProfile[]
     */
    public function handle($request)
    {
        $userID = $request->getUserID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/users/{$userID}/profile",
                ['access_token' => $accessToken]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Users\UserProfile', $response->getData());
    }
}
