<?php namespace spec\Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Products\ProductImage;
use Ordercloud\Entities\Products\ProductTag;
use Ordercloud\Entities\Products\ProductTagType;
use Ordercloud\Entities\Products\ProductType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    private $organisationShort;

    public function let()
    {
        $this->organisationShort = new OrganisationShort(1, 1, 1);
    }

    function it_can_retrieve_a_tag_by_name()
    {
        $fooTag = $this->createTagWithType('foo');
        $barTag = $this->createTagWithType('bAr');
        $bazTag = $this->createTagWithType('BAZ');
        $tags = [$fooTag, $barTag, $bazTag];

        $this->beConstructedWith(1, '', '', '', '', '', [], [], [], $tags, $this->organisationShort, 1, 1, 1, $images = [], [], new ProductType(1,1,1), null, true);

        $this->getTagByType('foo')->shouldReturn($fooTag);
        $this->getTagByType('bar')->shouldReturn($barTag);
        $this->getTagByType('baz')->shouldReturn($bazTag);
        $this->getTagByType('test')->shouldReturn(null);
    }

    function it_can_retrieve_a_default_image()
    {
        $img1 = $this->createImage(false);
        $img2 = $this->createImage(false);
        $imgDefault = $this->createImage(true);

        $images = [$img1, $img2, $imgDefault];
        $this->beConstructedWith(1, '', '', '', '', '', [], [], [], [], $this->organisationShort, 1, 1, 1, $images, [], new ProductType(1,1,1), null, true);

        $this->getDefaultImage()->shouldReturn($imgDefault);
    }

    function it_returns_null_when_retrieving_a_default_image_with_no_default()
    {
        $img1 = $this->createImage(false);
        $img2 = $this->createImage(false);

        $images = [$img1, $img2];
        $this->beConstructedWith(1, '', '', '', '', '', [], [], [], [], $this->organisationShort, 1, 1, 1, $images, [], new ProductType(1,1,1), null, true);

        $this->getDefaultImage()->shouldReturn(null);
    }

    function it_returns_null_when_retrieving_a_default_image_with_no_images()
    {
        $images = [];
        $this->beConstructedWith(1, '', '', '', '', '', [], [], [], [], $this->organisationShort, 1, 1, 1, $images, [], new ProductType(1,1,1), null, true);

        $this->getDefaultImage()->shouldReturn(null);
    }

    function it_can_check_if_it_has_a_default_image()
    {
        $img1 = $this->createImage(false);
        $img2 = $this->createImage(true);

        $images = [$img1, $img2];
        $this->beConstructedWith(1, '', '', '', '', '', [], [], [], [], $this->organisationShort, 1, 1, 1, $images, [], new ProductType(1,1,1), null, true);

        $this->hasDefaultImage()->shouldReturn(true);
    }

    function it_can_check_if_it_has_a_default_image_with_no_images()
    {
        $images = [];
        $this->beConstructedWith(1, '', '', '', '', '', [], [], [], [], $this->organisationShort, 1, 1, 1, $images, [], new ProductType(1,1,1), null, true);

        $this->hasDefaultImage()->shouldReturn(false);
    }

    protected function createTagWithType($type)
    {
        return new ProductTag(1, 1, 1, 1, 1, new ProductTagType(1, 1, $type), $this->organisationShort, null, []);
    }

    protected function createImage($default)
    {
        return new ProductImage('img1', '', $default);
    }
}
