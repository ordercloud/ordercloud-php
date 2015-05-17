<?php namespace Ordercloud\Entities\Products;

class ProductImage
{
    /** @var string */
    private $name;
    /** @var string */
    private $thumbnail;

    function __construct($name, $thumbnail)
    {
        $this->name = $name;
        $this->thumbnail = $thumbnail;
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
}
