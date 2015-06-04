<?php namespace Ordercloud\Entities\Connections;

class ConnectionFeeDetail
{
    /** @var integer */
    private $id;
    /** @var float */
    private $minValue;
    /** @var float */
    private $maxValue;
    /** @var float */
    private $fixedAmount;
    /** @var float */
    private $percentageAmount;
    /** @var float */
    private $volumeAmount;
    /** @var boolean */
    private $enabled;

    public function __construct($id, $minValue, $maxValue, $fixedAmount, $percentageAmount, $volumeAmount, $enabled)
    {
        $this->id = $id;
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->fixedAmount = $fixedAmount;
        $this->percentageAmount = $percentageAmount;
        $this->volumeAmount = $volumeAmount;
        $this->enabled = $enabled;
    }
}
