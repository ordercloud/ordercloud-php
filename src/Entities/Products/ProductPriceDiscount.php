<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductPriceDiscount implements JsonSerializable
{
    /**
     * The amount of discount
     * @var float
     */
    private $discountAmount;
    /**
     * Item price after discount
     * @var float
     */
    private $discountPrice; //TODO whats the difference ?

    public function __construct($discountAmount, $discountPrice)
    {
        $this->discountAmount = $discountAmount;
        $this->discountPrice = $discountPrice;
    }

    /**
     * @return float
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * @return float
     */
    public function getDiscountPrice()
    {
        return $this->discountPrice;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'discountAmount' => $this->getDiscountAmount(),
            'discountPrice' => $this->getDiscountPrice(),
        ];
    }
}
