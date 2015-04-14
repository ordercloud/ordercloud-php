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
    private $type;
    /** @var array|OrganisationProfile[] */
    private $profile;
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

    function __construct($id, $name, $code, array $type, array $profile, array $operatingHours, $ordersHash, $status, $lastOnline, $delivering, $open)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
        $this->profile = $profile;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param array|OrganisationType[] $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array|OrganisationProfile[]
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param array|OrganisationProfile[] $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
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
