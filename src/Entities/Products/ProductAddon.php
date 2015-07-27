<?php namespace Ordercloud\Entities\Products;

abstract class ProductAddon extends AbstractProductAddon
{
    /** @var boolean */
    private $enabled;
    /** @var OrganisationShort */
    private $organisation;

    public function __construct($id, $name, $description, $price, $enabled, OrganisationShort $organisation)
    {
        parent::__construct($id, $name, $description, $price);
        $this->enabled = $enabled;
        $this->organisation = $organisation;
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
}
