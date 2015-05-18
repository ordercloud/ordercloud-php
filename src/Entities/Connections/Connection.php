<?php namespace Ordercloud\Entities\Connections;

use Ordercloud\Entities\Organisations\Fees\OrganisationFee;
use Ordercloud\Entities\Organisations\OrganisationShort;

class Connection
{
    /** @var integer */
    private $id;
    /** @var OrganisationShort */
    private $fromOrganisation;
    /** @var OrganisationShort */
    private $toOrganisation;
    /** @var ConnectionType */
    private $type;
    /** @var string */
    private $ended;
    /** @var array|OrganisationFee[] */
    private $fees;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $status;
    /** @var string */
    private $settlementInterval;

    function __construct($id, OrganisationShort $fromOrganisation, OrganisationShort $toOrganisation, ConnectionType $type, $ended, array $fees, $enabled, $status, $settlementInterval)
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
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * @return array|OrganisationFee[]
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
