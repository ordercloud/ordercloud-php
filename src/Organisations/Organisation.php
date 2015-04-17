<?php namespace Ordercloud\Organisations;

class Organisation
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $code;
    /** @var array|OrganisationType[] */
    private $types;
    /** @var array|OrganisationProfile[] */
    private $profiles;
    /** @var array|OrganisationOperatingHours[] */
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

    function __construct($id, $name, $code, array $types, array $profiles, array $operatingHours, $ordersHash, $status, $lastOnline, $delivering, $open)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->types = $types;
        $this->profiles = $profiles;
        $this->operatingHours = $operatingHours;
        $this->ordersHash = $ordersHash;
        $this->status = $status;
        $this->lastOnline = $lastOnline;
        $this->delivering = $delivering;
        $this->open = $open;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return array|OrganisationType[]
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array|OrganisationType[] $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @return array|OrganisationProfile[]
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @param array|OrganisationProfile[] $profiles
     */
    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * @return array|OrganisationOperatingHours[]
     */
    public function getOperatingHours()
    {
        return $this->operatingHours;
    }

    /**
     * @param array|OrganisationOperatingHours[] $operatingHours
     */
    public function setOperatingHours($operatingHours)
    {
        $this->operatingHours = $operatingHours;
    }

    /**
     * @return int
     */
    public function getOrdersHash()
    {
        return $this->ordersHash;
    }

    /**
     * @param int $ordersHash
     */
    public function setOrdersHash($ordersHash)
    {
        $this->ordersHash = $ordersHash;
    }

    /**
     * @return undefined
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param undefined $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getLastOnline()
    {
        return $this->lastOnline;
    }

    /**
     * @param string $lastOnline
     */
    public function setLastOnline($lastOnline)
    {
        $this->lastOnline = $lastOnline;
    }

    /**
     * @return boolean
     */
    public function isDelivering()
    {
        return $this->delivering;
    }

    /**
     * @param boolean $delivering
     */
    public function setDelivering($delivering)
    {
        $this->delivering = $delivering;
    }

    /**
     * @return boolean
     */
    public function isOpen()
    {
        return $this->open;
    }

    /**
     * @param boolean $open
     */
    public function setOpen($open)
    {
        $this->open = $open;
    }
}
