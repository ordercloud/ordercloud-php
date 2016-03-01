<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductImage implements JsonSerializable
{
    /** @var string */
    private $name;
    /** @var string */
    private $thumbnail;
    /** @var bool */
    private $default;

    public function __construct($name, $thumbnail, $default)
    {
        $this->name = $name;
        $this->thumbnail = $thumbnail;
        $this->default = $default;
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
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'thumbnail' => $this->getThumbnail(),
            'default' => $this->isDefault(),
        ];
    }
}
