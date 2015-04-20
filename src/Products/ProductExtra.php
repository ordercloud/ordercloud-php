<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\OrganisationShort;

class ProductExtra
{
    /** @var integer */
    private $id;
    /** @var number */
    private $price;
    /** @var array|ProductTag[] */
    private $tags;
    /** @var boolean */
    private $enabled;
    /** @var OrganisationShort */
    private $organisation;

}
