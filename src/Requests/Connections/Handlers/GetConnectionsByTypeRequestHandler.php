<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Connections\GetChildConnectionsRequest;
use Ordercloud\Requests\Connections\GetConnectionsByTypeRequest;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetConnectionsByTypeRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetConnectionsByTypeRequest $request
     */
    protected function configure($request)
    {
        $organisaionID = null;

        if ($request->hasOrganisationID()) {
            $organisaionID = $request->getOrganisationID() . '/';
        }

        $this->url = sprintf('/resource/organisations/%sconnections/type/%s', $organisaionID, $request->getType());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseAll('Ordercloud\Entities\Connections\Connection', $response->getData('results'));
    }
}
