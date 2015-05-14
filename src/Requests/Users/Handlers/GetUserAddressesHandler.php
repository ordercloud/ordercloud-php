<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetUserAddresses;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetUserAddressesHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;
    /** @var Parser */
    private $parser;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->ordercloud = $ordercloud;
        $this->parser = $parser;
    }

    /**
     * @param GetUserAddresses $request
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
                [ 'access_token' => $accessToken ]
            )
        );

        return $this->parser->parseUserAddresses($response->getData('results'));
    }
}
