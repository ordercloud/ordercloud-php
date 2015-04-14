<?php namespace Ordercloud\Connections;

use Ordercloud\Organisations\Organisation;
use Ordercloud\Organisations\OrganisationFee;

class Connection
{
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
    /** @var array|OrganisationFee[] */
    private $fee;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $status;
    /** @var string */
    private $settlementInterval;
}
