<?php namespace Ordercloud\Entities\Products;

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
    private $type;
    /** @var ProductTagLink */
    private $parentTag;
    /**
     * @var array|ProductTagLink[]
     * @reflectType Ordercloud\Entities\Products\ProductTagLink
     */
    private $childTags;

    public function __construct($id, $name, $description, $shortDescription, $enabled, ProductTagType $tagType = null, ProductTagLink $parentTag = null, array $childTags)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->enabled = $enabled;
        $this->type = $tagType;
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
     * @param string $typeName
     *
     * @return bool
     */
    public function isType($typeName)
    {
        if (is_null($this->getType())) {
            return false;
        }

        return strcasecmp($this->getType()->getName(), $typeName) === 0;
    }

    /**
     * @return ProductTagType
     */
    public function getType()
    {
        return $this->type;
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
