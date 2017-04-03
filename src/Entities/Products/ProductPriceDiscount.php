<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductPriceDiscount implements JsonSerializable
{
    /**
     * The amount of discount
     * @var float
     */
    private $amount;
    /**
     * Item price befor discount
     * @var float
     */
    private $originalPrice;

    /**
     * Percentage discount of the price
     * @var float
     */
    private $percentage;

    /**
     * Percentage discount descritpion
     * @var String
     */
    private $description;

    /**
     * Is the discount by the product owner
     * @var Boolean
     */
    private $productOwner;


    public function __construct($amount, $originalPrice, $percentage , $description, $productOwner)
    {
        $this->amount = $amount;
        $this->originalPrice =  $originalPrice;
        $this->percentage=  $percentage;
        $this->description =  $description;
        $this->productOwner = $productOwner;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getOriginalPrice()
    {
        return $this->originalPrice;
    }

    /**
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Boolean
     */
    public function getProductOwner()
    {
        return $this->productOwner;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'amount' => $this->getAmount(),
            'description' => $this->getDescription(),
            'originalPrice' => $this->getOriginalPrice(),
            'percentage' => $this->getPercentage(),
            'productOwner' => $this->productOwner()
        ];
    }
}
