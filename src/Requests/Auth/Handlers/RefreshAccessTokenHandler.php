<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\RefreshAccessToken;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class RefreshAccessTokenHandler implements CommandHandler
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
     * @param RefreshAccessToken $request
     *
     * @return AccessToken
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_POST,
                '/resource/token/',
                [
                    'organisation_code'   => $request->getOrganisationCode(),
                    'organisation_secret' => $request->getClientSecret(),
                    'grant_type'          => 'refresh_token',
                    'refresh_token'       => $request->getRefreshToken()
                ]
            )
        );

        return $this->parser->parseAccessToken($response->getData());
    }
}
