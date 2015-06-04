<?php namespace Ordercloud\Entities\Products;

class ProductOptionSet
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var array|ProductOption[] */
    protected $options;
    /** @var array|ProductAttribute[] */
    protected $attributes;

    public function __construct($id, $name, array $options, array $attributes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->options = $options;
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
     * @return array|ProductOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $optionID
     *
     * @return ProductOption|null
     */
    public function getOptionByID($optionID)
    {
        foreach ($this->getOptions() as $option) {
            if ($option->getId() == $optionID) {
                return $option;
            }
        }

        return null;
    }

    /**
     * @return array|ProductAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
