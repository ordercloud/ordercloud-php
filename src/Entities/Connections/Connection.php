<?php namespace Ordercloud\Entities\Connections;

use JsonSerializable;
use Ordercloud\Entities\Organisations\Organisation;

class Connection implements JsonSerializable
{
    const STATUS_CONNECTED = 'CONNECTED';
    const STATUS_DECLINED = 'DECLINED';
    const STATUS_PENDING = 'PENDING';

    /** @var integer */
    private $id;
    /** @var Organisation */
    private $fromOrganisation;
    /** @var Organisation */
    private $toOrganisation;
    /** @var ConnectionType */
    private $type;
    /** @var string */
    private $ended;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $status;
    /** @var string */
    private $settlementInterval;

    public function __construct($id, Organisation $fromOrganisation, Organisation $toOrganisation, ConnectionType $type, $ended, $enabled, $status, $settlementInterval)
    {
        $this->id = $id;
        $this->fromOrganisation = $fromOrganisation;
        $this->toOrganisation = $toOrganisation;
        $this->type = $type;
        $this->ended = $ended;
        $this->enabled = $enabled;
        $this->status = $status;
        $this->settlementInterval = $settlementInterval;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Organisation
     */
    public function getFromOrganisation()
    {
        return $this->fromOrganisation;
    }

    /**
     * @return Organisation
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
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSettlementInterval()
    {
        return $this->settlementInterval;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'fromOrganisation' => $this->getFromOrganisation(),
            'toOrganisation' => $this->getToOrganisation(),
            'type' => $this->getType(),
            'ended' => $this->getEnded(),
            'enabled' => $this->isEnabled(),
            'status' => $this->getStatus(),
            'settlementInterval' => $this->getSettlementInterval(),
        ];
    }
}
