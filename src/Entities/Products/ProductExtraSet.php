<?php namespace Ordercloud\Entities\Products;

class ProductExtraSet
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /**
     * @var array|ProductExtra[]
     * @reflectType Ordercloud\Entities\Products\ProductExtra
     */
    protected $extras;
    /**
     * @var array|ProductAttribute[]
     * @reflectType Ordercloud\Entities\Products\ProductAttribute
     */
    protected $attributes;

    public function __construct($id, $name, array $extras, array $attributes)
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

    public function getSortedExtras(ProductAddonComparator $comparator)
    {
        $extras = $this->getExtras();

        usort($extras, $comparator);

        return $extras;
    }

    /**
     * @param $extraID
     *
     * @return ProductExtra|null
     */
    public function getExtraByID($extraID)
    {
        foreach ($this->getExtras() as $extra) {
            if ($extra->getId() == $extraID) {
                return $extra;
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
