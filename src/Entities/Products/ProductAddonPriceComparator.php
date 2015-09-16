<?php namespace Ordercloud\Entities\Products;

class ProductAddonPriceComparator extends ProductAddonComparator
{
    public function compare(ProductAddon $a, ProductAddon $b)
    {
        return bccomp($a->getPrice(), $b->getPrice(), 2);
    }
}
