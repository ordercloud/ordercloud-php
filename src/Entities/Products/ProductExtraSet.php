<?php namespace Ordercloud\Entities\Products;

class ProductExtraSet
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var array|ProductExtra[] */
    protected $extras;
    /** @var array|ProductAttribute[] */
    protected $attributes;

    function __construct($id, $name, array $extras, array $attributes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->extras = $extras;
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
     * @return array|ProductExtra[]
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @return array|ProductAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
