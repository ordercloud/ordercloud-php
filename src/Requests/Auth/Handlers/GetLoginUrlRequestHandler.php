<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\GetLoginUrlRequest;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;

class GetLoginUrlRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetLoginUrlRequest $request
     *
     * @return string
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_POST,
                'faces/credential',
                [
                    'organisation_id' => $request->getOrganisationID(),
                    'client_secret'   => $request->getClientSecret(),
                    'redirect_url'    => $request->getRedirectUrl(),
                    'mobile'          => $request->isMobile(),
                    'login'           => 'login'
                ],
                [
                    'Content-type' => 'application/x-www-form-urlencoded'
                ]
            )
        );

        return $response->getUrl();
    }
}
