<?php namespace Ordercloud\Entities\Orders;

use Carbon\Carbon;
use JsonSerializable;

class ScheduleOption implements JsonSerializable
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

    /**
     * @param int $interval In minutes
     *
     * @return array|Carbon
     */
    public function getTimeOptions($interval)
    {
        $min = Carbon::parse($this->getMin());
        $max = Carbon::parse($this->getMax());
        $options = [];

        // Round up to the closest interval
        while ($min->minute % $interval != 0) {
            $min->addMinute();
        }

        // Add options foreach interval
        while ($min->lte($max)) {
            $options[] = $min->copy();
            $min->addMinutes($interval);
        }

        return $options;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'min' => $this->getMin(),
            'max' => $this->getMax(),
            'date' => $this->getDate(),
        ];
    }
}
