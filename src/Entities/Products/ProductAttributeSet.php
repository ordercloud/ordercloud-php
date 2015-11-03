<?php namespace Ordercloud\Entities\Products;

class ProductAttributeSet
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $displayName;
    /**
     * @var string
     */
    private $description;
    /**
     * @var bool
     */
    private $enabled;
    /**
     * @var array|ProductAttribute[]
     */
    private $attributes;

    /**
     * @param int                      $id
     * @param string                   $name
     * @param string                   $displayName
     * @param string                   $description
     * @param bool                     $enabled
     * @param array|ProductAttribute[] $attributes
     */
    public function __construct($id, $name, $displayName, $description, $enabled, array $attributes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->displayName = $displayName;
        $this->description = $description;
        $this->enabled = $enabled;
        $this->attributes = $attributes;
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
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return array|ProductAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
