<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\GetLoginUrl;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetRegisterUrlHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetLoginUrl $request
     *
     * @return UserShort
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_POST,
                "faces/credential",
                [
                    'organisation_id' => $request->getOrganisationID(),
                    'client_secret'   => $request->getClientSecret(),
                    'redirect_url'    => $request->getRedirectUrl(),
                    'mobile'          => $request->isMobile(),
                    'register'        => 'register'
                ],
                [
                    'Content-type' => 'application/x-www-form-urlencoded'
                ]
            )
        );

        return $response->getUrl();
    }
}
