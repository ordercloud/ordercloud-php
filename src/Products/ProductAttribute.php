<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\OrganisationShort;

class ProductAttribute
{
    /** @var integer */
    private $id;
    /** @var boolean */
    private $enabled;
    /** @var OrganisationShort */
    private $organisation;

    function __construct($id, $enabled, OrganisationShort $organisation)
    {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->organisation = $organisation;
    }
}
