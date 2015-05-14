<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetUserByAccessTokenHandler implements CommandHandler
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
     * @param UpdateUserProfile $request
     *
     * @return UserShort
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                'GET',
                "resource/users/logged_in",
                [
                    'access_token'    => $request->getAccessToken()
                ]
            )
        );

        return $this->parser->parseUser($response->getData());
    }
}
