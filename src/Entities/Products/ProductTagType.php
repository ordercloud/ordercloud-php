<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductTagType implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var string */
    private $description;
    /** @var string */
    private $name;

    public function __construct($id, $description, $name)
    {
        $this->id = $id;
        $this->name = $name;
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
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
        ];
    }
}
