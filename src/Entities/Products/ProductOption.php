<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductOption
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var float */
    private $price;
    /** @var boolean */
    private $enabled;
    /** @var OrganisationShort */
    private $organisation;
    /** @var array|ProductTag[] */
    private $tags;

    function __construct($id, $name, $description, $price, $enabled, OrganisationShort $organisation, array $tags)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->enabled = $enabled;
        $this->organisation = $organisation;
        $this->tags = $tags;
    }
}