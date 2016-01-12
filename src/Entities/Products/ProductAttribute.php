<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductAttribute implements JsonSerializable
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var boolean
     */
    private $enabled;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $value;
    /**
     * @var string
     */
    private $description;

    /**
     * @param int    $id
     * @param bool   $enabled
     * @param string $name
     * @param string $value
     * @param string $description
     */
    public function __construct($id, $enabled, $name, $value, $description)
    {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->name = $name;
        $this->value = $value;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'enabled' => $this->isEnabled(),
            'value' => $this->getValue()
        ];
    }
}
