<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationAddress;
use Ordercloud\Entities\Organisations\OrganisationShort;

class OrderItemMerchant extends OrganisationShort implements JsonSerializable
{
    /**
     * @var OrganisationAddress
     */
    private $address;
    /** @var string */
    private $contactNumber;

    public function __construct($id, $name, $code, OrganisationAddress $address = null, $contactNumber)
    {
        parent::__construct($id, $name, $code);
        $this->address = $address;
        $this->contactNumber = $contactNumber;
    }

    /**
     * @return OrganisationAddress|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['address'] = $this->getAddress();
        $json['contactNumber'] = $this->getContactNumber();

        return $json;
    }
}
