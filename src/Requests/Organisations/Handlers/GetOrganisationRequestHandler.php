<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Entities\Organisations\Organisation;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class GetOrganisationRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetOrganisationRequest $request
     *
     * @return Organisation
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET, "resource/organisations/{$organisationID}", ['access_token' => $accessToken]
            )
        );

        return EntityReflector::parse('Ordercloud\Entities\Organisations\Organisation', $response->getData());
    }
}
