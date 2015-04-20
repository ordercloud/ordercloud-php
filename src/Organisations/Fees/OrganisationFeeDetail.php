<?php namespace Ordercloud\Organisations\Fees;

class OrganisationFeeDetail
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

    function __construct($id, $minValue, $maxValue, $fixedAmount, $percentageAmount, $volumeAmount, $enabled)
    {
        $this->id = $id;
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->fixedAmount = $fixedAmount;
        $this->percentageAmount = $percentageAmount;
        $this->volumeAmount = $volumeAmount;
        $this->enabled = $enabled;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param float $minValue
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;
    }

    /**
     * @return float
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param float $maxValue
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }

    /**
     * @return float
     */
    public function getFixedAmount()
    {
        return $this->fixedAmount;
    }

    /**
     * @param float $fixedAmount
     */
    public function setFixedAmount($fixedAmount)
    {
        $this->fixedAmount = $fixedAmount;
    }

    /**
     * @return float
     */
    public function getPercentageAmount()
    {
        return $this->percentageAmount;
    }

    /**
     * @param float $percentageAmount
     */
    public function setPercentageAmount($percentageAmount)
    {
        $this->percentageAmount = $percentageAmount;
    }

    /**
     * @return float
     */
    public function getVolumeAmount()
    {
        return $this->volumeAmount;
    }

    /**
     * @param float $volumeAmount
     */
    public function setVolumeAmount($volumeAmount)
    {
        $this->volumeAmount = $volumeAmount;
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
}
