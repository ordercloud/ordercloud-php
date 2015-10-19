<?php namespace Ordercloud\Entities\Products;

class ProductExtraSet extends AbstractProductAddonSet
{
    /**
     * @var array|ProductExtra[]
     * @reflectType Ordercloud\Entities\Products\ProductExtra
     */
    protected $extras;

    /**
     * @param int                  $id
     * @param string               $name
     * @param string               $displayName
     * @param string               $description
     * @param boolean              $enabled
     * @param array|ProductExtra[] $extras
     */
    public function __construct($id, $name, $displayName, $description, $enabled, array $extras)
    {
        parent::__construct($id, $name, $displayName, $description, $enabled);
        $this->extras = $extras;
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
}
