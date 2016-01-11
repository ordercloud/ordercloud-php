<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductAttribute implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var boolean */
    private $enabled;
    /** @var OrganisationShort */
    private $organisation;

    public function __construct($id, $enabled, OrganisationShort $organisation)
    {
        $this->id = $id;
        $this->enabled = $enabled;
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
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
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
            'id' => $this->getId(),
            'enabled' => $this->isEnabled(),
            'organisation' => $this->getOrganisation(),
        ];
    }
}
