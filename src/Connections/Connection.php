<?php namespace Ordercloud\Connections;

use Ordercloud\Organisations\OrganisationShort;
use Ordercloud\Organisations\Fees\OrganisationFee;

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

    function __construct($id, $fromOrganisation, $toOrganisation, $type, $ended, array $fees, $enabled, $status, $settlementInterval)
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
}
