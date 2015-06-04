<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

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

    public function __construct($id, $name, $description, $shortDescription, $enabled, ProductTagType $tagType = null, OrganisationShort $organisation, ProductTagLink $parentTag = null, array $childTags)
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return ProductTagType
     */
    public function getTagType()
    {
        return $this->tagType;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return ProductTagLink
     */
    public function getParentTag()
    {
        return $this->parentTag;
    }

    /**
     * @return array|ProductTagLink[]
     */
    public function getChildTags()
    {
        return $this->childTags;
    }
}
