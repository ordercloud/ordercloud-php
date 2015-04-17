<?php namespace Ordercloud\Organisations;

class OrganisationProfile
{
    /** @var integer */
    private $id;
    /** @var User */
    private $contactPerson;
    /** @var string */
    private $contactNumber;
    /** @var boolean */
    private $enabled;
    /** @var integer */
    private $distance;
    /** @var string */
    private $latitude;
    /** @var string */
    private $longitude;

    function __construct($id, $contactPerson, $contactNumber, $enabled, $distance, $latitude, $longitude)
    {
        $this->id = $id;
        $this->contactPerson = $contactPerson;
        $this->contactNumber = $contactNumber;
        $this->enabled = $enabled;
        $this->distance = $distance;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return undefined
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @param undefined $contactPerson
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * @param string $contactNumber
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
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
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}
