<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Connections\GetMarketplaceConnectionsRequest;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetMarketplaceConnectionsRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetMarketplaceConnectionsRequest $request
     *
     * @return array|Connection[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();
        $connectionType = ConnectionType::MARKETPLACE;

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                sprintf('resource/organisations/%d/connections/type/%s', $organisationID, $connectionType),
                ['access_token' => $accessToken]
            )
        );

        return EntityReflector::parseAll('Ordercloud\Entities\Connections\Connection', $response->getData('results'));
    }
}
