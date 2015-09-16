<?php namespace Ordercloud\Entities\Settings;

use Ordercloud\Entities\Organisations\OrganisationShort;

class Setting
{
    /** @var integer */
    private $id;
    /** @var string */
    private $value;
    /** @var SettingKeyShort */
    private $key;
    /** @var string */
    private $startDate;
    /** @var string */
    private $endDate;
    /** @var OrganisationShort */
    private $organisation;

    public function __construct($id, $value, SettingKeyShort $key, $startDate, $endDate, OrganisationShort $organisation)
    {
        $this->id = $id;
        $this->value = $value;
        $this->key = $key;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->organisation = $organisation;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return SettingKeyShort
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}
