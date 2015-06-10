<?php namespace Ordercloud\Entities\Products;

class ProductImage
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
}
