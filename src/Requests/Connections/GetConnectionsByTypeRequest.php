<?php namespace Ordercloud\Requests\Connections;

use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Support\CommandBus\Command;

class GetConnectionsByTypeRequest implements Command
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var int|null
     */
    private $organisationID;

    /**
     * @param string   $type
     * @param int|null $organisationID
     */
    public function __construct($type, $organisationID = null)
    {
        $this->type = $type;
        $this->organisationID = $organisationID;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }

    /**
     * @return bool
     */
    public function hasOrganisationID()
    {
        return ! is_null($this->organisationID);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
