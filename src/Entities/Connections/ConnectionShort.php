<?php namespace Ordercloud\Entities\Connections;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;

class ConnectionShort implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var OrganisationShort
     */
    private $fromOrganisation;
    /**
     * @var OrganisationShort
     */
    private $toOrganisation;
    /**
     * @var ConnectionType
     */
    private $type;
    /**
     * @var string
     */
    private $status;

    /**
     * @param int               $id
     * @param OrganisationShort $fromOrganisation
     * @param OrganisationShort $toOrganisation
     * @param ConnectionType    $type
     * @param string            $status
     */
    public function __construct($id, OrganisationShort $fromOrganisation, OrganisationShort $toOrganisation, ConnectionType $type, $status)
    {
        $this->id = $id;
        $this->fromOrganisation = $fromOrganisation;
        $this->toOrganisation = $toOrganisation;
        $this->type = $type;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return OrganisationShort
     */
    public function getFromOrganisation()
    {
        return $this->fromOrganisation;
    }

    /**
     * @return OrganisationShort
     */
    public function getToOrganisation()
    {
        return $this->toOrganisation;
    }

    /**
     * @return ConnectionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function jsonSerialize()
    {
        return [
            'id'               => $this->getId(),
            'fromOrganisation' => $this->getFromOrganisation(),
            'toOrganisation'   => $this->getToOrganisation(),
            'type'             => $this->getType(),
            'status'           => $this->getStatus(),
        ];
    }
}
