<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\OrganisationShort;

class ProductTag
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $shortDescription;
    /** @var boolean */
    private $enabled;
    /** @var ProductTagType */
    private $tagType;
    /** @var OrganisationShort */
    private $organisation;
    /** @var ProductTagLink */
    private $parentTag;
    /** @var array|ProductTagLink[] */
    private $childTags;

    function __construct($id, $name, $description, $shortDescription, $enabled, ProductTagType $tagType, OrganisationShort $organisation, ProductTagLink $parentTag, array $childTags)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->enabled = $enabled;
        $this->tagType = $tagType;
        $this->organisation = $organisation;
        $this->parentTag = $parentTag;
        $this->childTags = $childTags;
    }
}
