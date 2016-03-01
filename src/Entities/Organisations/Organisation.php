<?php namespace Ordercloud\Entities\Organisations;

use JsonSerializable;
use Ordercloud\Entities\Transactions\Currency;

class Organisation extends OrganisationShort implements JsonSerializable
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
    /**
     * @var int
     */
    private $ordersHash;
    /**
     * @var OrganisationStatus
     */
    private $status;
    /**
     * @var int
     */
    private $lastOnline;
    /**
     * @var boolean
     */
    private $delivering;
    /**
     * @var boolean
     */
    private $open;
    /**
     * @var boolean
     */
    private $registeredDirectly;
    /**
     * @var Currency
     */
    private $currency;

    /**
     * @param int                          $id
     * @param string                       $name
     * @param string                       $code
     * @param OrganisationType[]           $types
     * @param OrganisationIndustry[]       $industries
     * @param OrganisationProfile          $profile
     * @param OrganisationOperatingHours[] $operatingHours
     * @param int                          $ordersHash
     * @param OrganisationStatus|null      $status
     * @param int                          $lastOnline
     * @param boolean                      $delivering
     * @param boolean                      $open
     * @param boolean                      $registeredDirectly
     * @param Currency                     $currency
     */
    public function __construct($id, $name, $code, array $types, array $industries, OrganisationProfile $profile, array $operatingHours, $ordersHash, OrganisationStatus $status = null, $lastOnline, $delivering, $open, $registeredDirectly, Currency $currency)
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
        $this->currency = $currency;
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
     * @return int
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

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['types'] = $this->getTypes();
        $json['industries'] = $this->getIndustries();
        $json['profile'] = $this->getProfile();
        $json['operatingHours'] = $this->getOperatingHours();
        $json['ordersHash'] = $this->getOrdersHash();
        $json['status'] = $this->getStatus();
        $json['lastOnline'] = $this->getLastOnline();
        $json['delivering'] = $this->isDelivering();
        $json['open'] = $this->isOpen();
        $json['registeredDirectly'] = $this->isRegisteredDirectly();
        $json['currency'] = $this->getCurrency();

        return $json;
    }
}
