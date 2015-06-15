<?php namespace Ordercloud\Requests\Connections;

use Ordercloud\Entities\Connections\ConnectionType;

class GetMarketplaceConnectionsRequest extends GetConnectionsByTypeRequest
{
    public function __construct($organisationID = null)
    {
        parent::__construct(ConnectionType::MARKETPLACE, $organisationID);
    }
}
