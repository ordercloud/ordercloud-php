<?php namespace Ordercloud\Entities\Organisations;

class Organisation extends OrganisationShort
{
    /**
     * @var array|OrganisationType[]
     * @reflectType Ordercloud\Entities\Organisations\OrganisationType
     */
    private $types;
    /**
     * @var array|OrganisationIndustry[]
     * @reflectType Ordercloud\Entities\Organisations\OrganisationIndustry
     */
    private $industries;
    /**
     * @var OrganisationProfile
     */
    private $profile;
    /**
     * @var array|OrganisationOperatingHours[]
     * @reflectType Ordercloud\Entities\Organisations\OrganisationOperatingHours
     */
    private $operatingHours;
    /** @var integer */
    private $ordersHash;
    /** @var OrganisationStatus */
    private $status;
    /** @var string */
    private $lastOnline;
    /** @var boolean */
    private $delivering;
    /** @var boolean */
    private $open;
    /** @var boolean */
    private $registeredDirectly;

    public function __construct($id, $name, $code, array $types, array $industries, OrganisationProfile $profile, array $operatingHours, $ordersHash, OrganisationStatus $status = null, $lastOnline, $delivering, $open, $registeredDirectly)
    {
        parent::__construct($id, $name, $code);
        $this->types = $types;
        $this->industries = $industries;
        $this->profile = $profile;
        $this->operatingHours = $operatingHours;
        $this->ordersHash = $ordersHash;
        $this->status = $status;
        $this->lastOnline = $lastOnline;
        $this->delivering = $delivering;
        $this->open = $open;
        $this->registeredDirectly = $registeredDirectly;
    }

    /**
     * @return array|OrganisationType[]
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @return array|OrganisationIndustry[]
     */
    public function getIndustries()
    {
        return $this->industries;
    }

    /**
     * @return OrganisationProfile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return array|OrganisationOperatingHours[]
     */
    public function getOperatingHours()
    {
        return $this->operatingHours;
    }

    /**
     * @return int
     */
    public function getOrdersHash()
    {
        return $this->ordersHash;
    }

    /**
     * @return OrganisationStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getLastOnline()
    {
        return $this->lastOnline;
    }

    /**
     * @return boolean
     */
    public function isDelivering()
    {
        return $this->delivering;
    }

    /**
     * @return boolean
     */
    public function isOpen()
    {
        return $this->open;
    }

    /**
     * @return boolean
     */
    public function isRegisteredDirectly()
    {
        return $this->registeredDirectly;
    }
}
