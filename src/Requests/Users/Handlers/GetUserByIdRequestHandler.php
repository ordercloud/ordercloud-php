<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\User;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetUserByIdRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class GetUserByIdRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetUserByIdRequest $request
     *
     * @return User
     */
    public function handle($request)
    {
        $userID = $request->getUserID();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/users/{$userID}",
                [
                    'access_token'    => $request->getAccessToken()
                ]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Users\User', $response->getData());
    }
}
