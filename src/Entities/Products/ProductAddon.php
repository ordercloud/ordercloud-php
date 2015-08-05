<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

abstract class ProductAddon extends AbstractProductAddon
{
    /** @var boolean */
    private $enabled;

    public function __construct($id, $name, $description, $price, $enabled)
    {
        parent::__construct($id, $name, $description, $price);
        $this->enabled = $enabled;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }
}
