<?php namespace spec\Ordercloud\Entities\Products;

use Ordercloud\Entities\Products\ProductAddon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductAddonPriceComparatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ordercloud\Entities\Products\ProductAddonPriceComparator');
    }

    function it_can_identify_same_price_addons(ProductAddon $a, ProductAddon $b)
    {
        $a->getPrice()->willReturn(0.14);
        $b->getPrice()->willReturn(0.14);

        $this->compare($a, $b)->shouldReturn(0);
    }

    function it_can_identify_less_than_price_addons(ProductAddon $a, ProductAddon $b)
    {
        $a->getPrice()->willReturn(0.22);
        $b->getPrice()->willReturn(0.88);

        $this->compare($a, $b)->shouldReturn(-1);
    }

    function it_can_identify_greater_than_price_addons(ProductAddon $a, ProductAddon $b)
    {
        $a->getPrice()->willReturn(0.99);
        $b->getPrice()->willReturn(0.11);

        $this->compare($a, $b)->shouldReturn(1);
    }
}
