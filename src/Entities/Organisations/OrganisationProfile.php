<?php namespace Ordercloud\Entities\Organisations;

class OrganisationProfile
{
    /** @var integer */
    private $id;
    /** @var UserShort */
    private $contactPerson;
    /** @var string */
    private $contactNumber;
    /** @var boolean */
    private $enabled;
    /** @var OrganisationAddress */
    private $address;

    public function __construct($id, UserShort $contactPerson, $contactNumber, $enabled, OrganisationAddress $address = null)
    {
        $this->id = $id;
        $this->contactPerson = $contactPerson;
        $this->contactNumber = $contactNumber;
        $this->enabled = $enabled;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return UserShort
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return OrganisationAddress
     */
    public function getAddress()
    {
        return $this->address;
    }
}
