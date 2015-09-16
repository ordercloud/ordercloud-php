<?php namespace Ordercloud\Entities\Connections;

use Ordercloud\Entities\Organisations\Organisation;

class Connection
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
    /**
     * @var array|ConnectionFee[]
     * @reflectName fee
     * @reflectType Ordercloud\Entities\Connections\ConnectionFee
     */
    private $fees;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $status;
    /** @var string */
    private $settlementInterval;

    public function __construct($id, Organisation $fromOrganisation, Organisation $toOrganisation, ConnectionType $type, $ended, array $fees, $enabled, $status, $settlementInterval)
    {
        $this->id = $id;
        $this->fromOrganisation = $fromOrganisation;
        $this->toOrganisation = $toOrganisation;
        $this->type = $type;
        $this->ended = $ended;
        $this->fees = $fees;
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
     * @return array|ConnectionFee[]
     */
    public function getFees()
    {
        return $this->fees;
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
}
