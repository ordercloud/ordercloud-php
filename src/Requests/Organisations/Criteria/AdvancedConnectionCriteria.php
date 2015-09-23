<?php namespace Ordercloud\Requests\Organisations\Criteria;

class AdvancedConnectionCriteria extends ExtendedConnectionCriteria
{
    /**
     * @var array|int[]
     */
    private $statuses;
    /**
     * @var int
     */
    private $radius;
    /**
     * @var string
     */
    private $lat;
    /**
     * @var string
     */
    private $lon;
    /**
     * @var array|int[]
     */
    private $industries;

    /**
     * @return array|int[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * @param array|int[] $statuses
     *
     * @return static
     */
    public function setStatuses(array $statuses)
    {
        $this->statuses = $statuses;

        return $this;
    }

    /**
     * @return int
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param int $radius
     *
     * @return static
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     *
     * @return static
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return string
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param string $lon
     *
     * @return static
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getIndustries()
    {
        return $this->industries;
    }

    /**
     * @param array|int[] $industries
     *
     * @return static
     */
    public function setIndustries($industries)
    {
        $this->industries = $industries;

        return $this;
    }
}
