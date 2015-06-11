<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Entities\Organisations\OrganisationAccessToken;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Organisations\GetOrganisationAccessTokenRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrganisationAccessTokenRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetOrganisationAccessTokenRequest $request
     *
     * @return OrganisationAccessToken
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/organisations/{$organisationID}/accesstoken",
                ['access_token' => $accessToken]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Organisations\OrganisationAccessToken', $response->getData());
    }
}
