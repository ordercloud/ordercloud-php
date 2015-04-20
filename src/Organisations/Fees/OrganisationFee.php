<?php namespace Ordercloud\Organisations\Fees;

use Ordercloud\Organisations\Fees\OrganisationFeeDetail;
use Ordercloud\Organisations\Fees\OrganisationFeeType;
use Ordercloud\Organisations\OrganisationType;

class OrganisationFee
{
    /** @var integer */
    private $id;
    /** @var string */
    private $startDate;
    /** @var string */
    private $endDate;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $lastUpdated;
    /** @var array|OrganisationFeeDetail[] */
    private $details;
    /** @var OrganisationFeeType */
    private $type;

    function __construct($id, $startDate, $endDate, $enabled, $lastUpdated, array $details, $type)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->enabled = $enabled;
        $this->lastUpdated = $lastUpdated;
        $this->details = $details;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param string $lastUpdated
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return array|OrganisationFeeDetail[]
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param array|OrganisationFeeDetail[] $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return OrganisationType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param OrganisationType $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
