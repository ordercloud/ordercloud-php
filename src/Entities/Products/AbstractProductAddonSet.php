<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

abstract class AbstractProductAddonSet implements JsonSerializable
{
    /** @var int */
    private $id;
    /** @var string */
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
     * @var boolean
     */
    private $enabled;

    /**
     * @param int                  $id
     * @param string               $name
     * @param string               $displayName
     * @param string               $description
     * @param boolean              $enabled
     * @param array|ProductExtra[] $extras
     */
    public function __construct($id, $name, $displayName, $description, $enabled)
    {
        $this->id = $id;
        $this->name = $name;
        $this->displayName = $displayName;
        $this->description = $description;
        $this->enabled = $enabled;
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
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'displayName' => $this->getDisplayName(),
            'description' => $this->getDescription(),
            'enabled' => $this->isEnabled(),
        ];
    }
}
