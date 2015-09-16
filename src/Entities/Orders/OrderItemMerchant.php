<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Organisations\OrganisationAddress;
use Ordercloud\Entities\Organisations\OrganisationShort;

class OrderItemMerchant extends OrganisationShort
{
    /**
     * @var OrganisationAddress
     */
    private $address;

    public function __construct($id, $name, $code, OrganisationAddress $address = null)
    {
        parent::__construct($id, $name, $code);
        $this->address = $address;
    }

    /**
     * @return OrganisationAddress|null
     */
    public function getAddress()
    {
        return $this->address;
    }
}
