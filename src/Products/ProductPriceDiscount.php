<?php namespace Ordercloud\Products;

class ProductPriceDiscount
{
    /** @var float */
    private $discountAmount;
    /** @var float */
    private $discountPrice; //TODO whats the difference ?

    function __construct($discountAmount, $discountPrice)
    {
        $this->discountAmount = $discountAmount;
        $this->discountPrice = $discountPrice;
    }
}
