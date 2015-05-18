<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\User;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetUserByID;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetUserByIDHandler implements CommandHandler
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
     * @param GetUserByID $request
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

        return $this->parser->parseUser($response->getData());
    }
}
