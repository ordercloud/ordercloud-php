<?php namespace Ordercloud\Entities\Organisations;

use Ordercloud\Organisations\undefined;
use Ordercloud\Organisations\User;

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
    /** @var OrganisationAddress */
    private $address;

    function __construct($id, $contactPerson, $contactNumber, $enabled, $address = null)
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
     * @return OrganisationAddress
     */
    public function getAddress()
    {
        return $this->address;
    }
}
