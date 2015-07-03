<?php namespace Ordercloud\Entities\Products;

class ProductOptionDisplay
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var float */
    private $price;
    /**
     * @var ProductTag
     */
    private $tag;

    public function __construct($id, $name, $description, $price, ProductTag $tag = null) //TODO when api is fixed, remove the null
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->tag = $tag;
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return ProductTag
     */
    public function getTag()
    {
        return $this->tag;
    }
}
