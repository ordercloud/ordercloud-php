<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetUserAddressesRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class GetUserAddressesRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetUserAddressesRequest $request
     *
     * @return array|UserAddress[]
     */
    public function handle($request)
    {
        $userID = $request->getUserID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/users/{$userID}/geos",
                ['access_token' => $accessToken]
            )
        );

        return EntityReflector::parseAll('Ordercloud\Entities\Users\UserAddress', $response->getData('results'));
    }
}
