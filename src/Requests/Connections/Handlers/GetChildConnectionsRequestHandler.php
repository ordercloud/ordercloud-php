<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Connections\GetChildConnectionsRequest;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class GetChildConnectionsRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetChildConnectionsRequest $request
     *
     * @return array|Connection[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();
        $connectionType = ConnectionType::CHILD;

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
