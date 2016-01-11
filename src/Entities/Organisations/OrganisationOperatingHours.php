<?php namespace Ordercloud\Entities\Organisations;

use JsonSerializable;

class OrganisationOperatingHours implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var integer */
    private $day;
    /** @var string */
    private $openTime;
    /** @var string */
    private $closeTime;
    /** @var string */
    private $dayName;

    public function __construct($id, $day, $openTime, $closeTime, $dayName)
    {
        $this->id = $id;
        $this->day = $day;
        $this->openTime = $openTime;
        $this->closeTime = $closeTime;
        $this->dayName = $dayName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param int $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return string
     */
    public function getOpenTime()
    {
        return $this->openTime;
    }

    /**
     * @param string $openTime
     */
    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;
    }

    /**
     * @return string
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * @param string $closeTime
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
    }

    /**
     * @return string
     */
    public function getDayName()
    {
        return $this->dayName;
    }

    /**
     * @param string $dayName
     */
    public function setDayName($dayName)
    {
        $this->dayName = $dayName;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'day' => $this->getDay(),
            'openTime' => $this->getOpenTime(),
            'closeTime' => $this->getCloseTime(),
            'dayName' => $this->getDayName(),
        ];
    }
}
