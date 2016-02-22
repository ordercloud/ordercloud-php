<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;

class OrderDelivery implements JsonSerializable
{
    /**
     * @var bool
     */
    private $external;
    /**
     * @var OrganisationShort
     */
    private $organisation;

    /**
     * @param boolean           $external
     * @param OrganisationShort $organisation
     */
    public function __construct($external, $organisation)
    {
        $this->external = $external;
        $this->organisation = $organisation;
    }

    /**
     * @return boolean
     */
    public function isExternal()
    {
        return $this->external;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'external' => $this->isExternal(),
            'organisation' => $this->getOrganisation(),
        ];
    }
}
