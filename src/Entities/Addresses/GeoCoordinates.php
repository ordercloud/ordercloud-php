<?php namespace Ordercloud\Entities\Addresses;

class GeoCoordinates
{
    /** @var string */
    private $latitude;
    /** @var string */
    private $longitude;

    /**
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
