<?php namespace Ordercloud\Organisations;

class Organisation extends OrganisationShort
{
    /** @var array|OrganisationType[] */
    private $types;
    /** @var array|OrganisationIndustry[] */
    private $industries;
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
    /** @var boolean */
    private $registeredDirectly;

    function __construct($id, $name, $code, array $types, array $industries, array $profiles, array $operatingHours, $ordersHash, OrganisationStatus $status, $lastOnline, $delivering, $open, $registeredDirectly)
    {
        parent::__construct($id, $name, $code);
        $this->types = $types;
        $this->industries = $industries;
        $this->profiles = $profiles;
        $this->operatingHours = $operatingHours;
        $this->ordersHash = $ordersHash;
        $this->status = $status;
        $this->lastOnline = $lastOnline;
        $this->delivering = $delivering;
        $this->open = $open;
        $this->registeredDirectly = $registeredDirectly;
    }
}
