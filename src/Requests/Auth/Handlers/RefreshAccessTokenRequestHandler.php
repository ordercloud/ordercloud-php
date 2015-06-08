<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\RefreshAccessTokenRequest;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class RefreshAccessTokenRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param RefreshAccessTokenRequest $request
     *
     * @return AccessToken
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_POST, '/resource/token/', [
                    'organisation_code'   => $request->getOrganisationCode(),
                    'organisation_secret' => $request->getClientSecret(),
                    'grant_type'          => 'refresh_token',
                    'refresh_token'       => $request->getRefreshToken()
                ]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Auth\AccessToken', $response->getData());
    }
}
