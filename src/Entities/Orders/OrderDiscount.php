<?php namespace Ordercloud\Entities\OrderDiscount;

use JsonSerializable;

class OrderDiscount implements JsonSerializable
{

    
    /** @var flaat */
    private $amount;
    /** @var string */
    private $description;
    /** @var float */
    private $originalPrice;
    /** @var float */
    private $percentage;

    public function __construct(
        $amount,
        $description,
        $originalPrice,
        $percentage
    )
    {
        $this->amount =$amount;
        $this->description = $description;
        $this->originalPrice = $originalPrice;
        $this->percentage = $percentage;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->descriptione;
    }

    /**
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @return float
     */
    public function getDateCreated()
    {
        return $this->originalPrice;
    }



    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            "amount" => $this->amount,
            "description" => $this->description,
            "originalPrice" => $this->originalPrice,
            "percentage" => $this->percentage
        ];
    }
}
