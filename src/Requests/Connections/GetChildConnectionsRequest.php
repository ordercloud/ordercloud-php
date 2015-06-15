<?php namespace Ordercloud\Requests\Connections;

use Ordercloud\Entities\Connections\ConnectionType;

class GetChildConnectionsRequest extends GetConnectionsByTypeRequest
{
    public function __construct($organisationID = null)
    {
        parent::__construct(ConnectionType::CHILD, $organisationID);
    }
}
