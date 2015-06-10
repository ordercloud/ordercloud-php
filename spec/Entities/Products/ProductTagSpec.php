<?php namespace spec\Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Products\ProductTagType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductTagSpec extends ObjectBehavior
{
    function it_can_check_if_it_is_a_specific_type_by_name()
    {
        $this->beConstructedWith(65, null, null, null, null, new ProductTagType(1, null, 'test'), new OrganisationShort(null, null, null), null, []);

        $this->isType('test')->shouldReturn(true);
    }

    function it_can_check_if_it_is_a_specific_type_by_name_case_insensitive()
    {
        $this->beConstructedWith(65, null, null, null, null, new ProductTagType(1, null, 'TesT'), new OrganisationShort(null, null, null), null, []);

        $this->isType('tEst')->shouldReturn(true);
    }

    function it_can_check_if_it_is_a_specific_type_by_name_if_it_has_no_type()
    {
        $this->beConstructedWith(65, null, null, null, null, $tagType = null, new OrganisationShort(null, null, null), null, []);

        $this->isType('test')->shouldReturn(false);
    }
}
