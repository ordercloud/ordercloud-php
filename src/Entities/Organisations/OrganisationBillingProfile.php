<?php namespace Ordercloud\Entities\Organisations;

use JsonSerializable;

class OrganisationBillingProfile implements JsonSerializable
{


    /** @var integer */
    private $businessName;
    /** @var UserShort */
    private $vatNumber;
    /** @var string */
    private $contactName;
    /** @var string */
    private $phoneNumber;
    /** @var string */
    private $email;
    /** @var String */
    private $address;

    public function __construct($businessName, $vatNumber, $contactName, $phoneNumber, $email, $address)
    {
        $this->businessName = $businessName;
        $this->vatNumber = $vatNumber;
        $this->contactName = $contactName;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'businessName' => $this->getBusinessName(),
            'vatNumber' => $this->getVatNumber(),
            'contactName' => $this->getContactName(),
            'phoneNumber' => $this->getPhoneNumber(),
            'email' => $this->getEmail(),
            'address' => $this->getAddress(),
        ];
    }
}
