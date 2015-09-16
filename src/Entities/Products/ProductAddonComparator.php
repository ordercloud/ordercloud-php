<?php namespace Ordercloud\Entities\Products;

abstract class ProductAddonComparator
{
    /**
     * Compares the addons and returns an int which tells if the
     * values compare less than (-1), equal (0), or greater than (1).
     *
     * @param ProductAddon $a
     * @param ProductAddon $b
     *
     * @return int
     */
    abstract public function compare(ProductAddon $a, ProductAddon $b);

    public function __invoke(ProductAddon $a, ProductAddon $b)
    {
        return $this->compare($a, $b);
    }
}
