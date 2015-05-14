<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetUserProfile;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetUserProfileHandler implements CommandHandler
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
     * @param GetUserProfile $request
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
                [ 'access_token' => $accessToken ]
            )
        );

        return $this->parser->parseUserProfile($response->getData());
    }
}
