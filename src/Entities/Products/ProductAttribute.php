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
    private $description;
    /**
     * @var bool
     */
    private $required;
    /**
     * @var array|string[]
     */
    private $options;

    /**
     * @param int            $id
     * @param bool           $enabled
     * @param string         $name
     * @param string         $description
     * @param boolean        $required
     * @param array|string[] $options
     */
    public function __construct($id, $enabled, $name, $description, $required, array $options = [])
    {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->name = $name;
        $this->description = $description;
        $this->required = $required;
        $this->options = $options;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @return array|string[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id'          => $this->getId(),
            'name'        => $this->getName(),
            'description' => $this->getDescription(),
            'required'    => $this->isRequired(),
            'options'     => $this->getDescription(),
            'enabled'     => $this->isEnabled(),
        ];
    }
}
