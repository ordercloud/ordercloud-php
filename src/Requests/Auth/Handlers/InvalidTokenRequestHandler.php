<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\InvalidTokenRequest;
use Ordercloud\Requests\Exceptions\InvalidAccessTokenException;
use Ordercloud\Requests\Handlers\OrdercloudRequestHandler;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Client;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Http\UrlParameteriser;
use Ordercloud\Support\TokenRefresher;

class InvalidTokenRequestHandler implements CommandHandler
{
    /**
     * @var Ordercloud
     */
    private $ordercloud;
    /**
     * @var TokenRefresher
     */
    private $tokenRefresher;

    public function __construct(Ordercloud $ordercloud, TokenRefresher $tokenRefresher)
    {
        $this->ordercloud = $ordercloud;
        $this->tokenRefresher = $tokenRefresher;
    }

    /**
     * @param InvalidTokenRequest $request
     *
     * @return Response
     *
     * @throws InvalidAccessTokenException
     */
    public function handle($request)
    {
        $accessToken = $this->tokenRefresher->refresh($this->ordercloud);

        $this->ordercloud->setAccessToken($accessToken->getAccessToken());

        return $this->ordercloud->exec($request->getPreviousRequest());
    }
}
