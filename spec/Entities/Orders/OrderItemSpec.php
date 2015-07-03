<?php namespace spec\Ordercloud\Entities\Orders;

use Ordercloud\Entities\Orders\OrderItemExtra;
use Ordercloud\Entities\Orders\OrderItemOption;
use Ordercloud\Entities\Orders\OrderStatus;
use Ordercloud\Entities\Products\ProductExtraDisplay;
use Ordercloud\Entities\Products\ProductOptionDisplay;
use Ordercloud\Entities\Products\ProductShort;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderItemSpec extends ObjectBehavior
{
    function let(ProductShort $detail, OrderStatus $status)
    {
        $price = 60;
        $quantity = 2;
        $extras = [
            new OrderItemExtra(1, 5, new ProductExtraDisplay(null, null, null, null, null)),
            new OrderItemExtra(2, 3, new ProductExtraDisplay(null, null, null, null, null)),
        ];
        $options = [
            new OrderItemOption(1, 10, new ProductOptionDisplay(null, null, null, null, null)),
            new OrderItemOption(2, 2, new ProductOptionDisplay(null, null, null, null, null)),
        ];
        $linePrice = 30;

        $this->beConstructedWith(1, $price, $quantity, $linePrice, true, $detail, $status, null, null, null, $extras, $options);
    }

    function it_can_caclulate_the_order_item_price()
    {
        $this->getLinePrice()->shouldReturn(30.0);
    }

    function it_can_calculate_the_total_order_item_price()
    {
        $this->getPrice()->shouldReturn(60.0);
    }
}
