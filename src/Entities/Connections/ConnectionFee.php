<?php namespace Ordercloud\Entities\Connections;

class ConnectionFee
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
    /** @var array|ConnectionFeeDetail[] */
    private $details;
    /** @var ConnectionFeeType */
    private $type;
    /** @var ConnectionFeeMetric */
    private $metric;
    /** @var ConnectionFeeStructure */
    private $structure;

    public function __construct($id, $startDate, $endDate, $enabled, $lastUpdated, array $details, ConnectionFeeType $type, ConnectionFeeMetric $metric, ConnectionFeeStructure $structure)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->enabled = $enabled;
        $this->lastUpdated = $lastUpdated;
        $this->details = $details;
        $this->type = $type;
        $this->metric = $metric;
        $this->structure = $structure;
    }
}
