<?php namespace Ordercloud\Entities\Orders;

class ScheduleOption
{
    /**
     * @var string
     */
    private $min;
    /**
     * @var string
     */
    private $max;
    /**
     * @var string
     */
    private $date;

    /**
     * @param string $min  Minimum time of day that order can be scheduled
     * @param string $max  Maximum time of day that order can be scheduled
     * @param string $date The date when the min and max times are applicable
     */
    public function __construct($min, $max, $date)
    {
        $this->min = $min;
        $this->max = $max;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return string
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}
