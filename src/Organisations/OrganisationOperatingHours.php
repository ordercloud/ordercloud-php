<?php namespace Ordercloud\Organisations;

class OrganisationOperatingHours
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

    function __construct($id, $day, $openTime, $closeTime, $dayName)
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
}
