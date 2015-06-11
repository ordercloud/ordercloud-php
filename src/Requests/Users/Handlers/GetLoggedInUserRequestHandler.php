<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\User;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetLoggedInUserRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetLoggedInUserRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetLoggedInUserRequest $request
     *
     * @return User
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                'resource/users/logged_in',
                ['access_token' => $request->getAccessToken()],
                ['Authorization' => $request->getAuthHeader()]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Users\User', $response->getData());
    }
}
