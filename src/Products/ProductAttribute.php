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
}
