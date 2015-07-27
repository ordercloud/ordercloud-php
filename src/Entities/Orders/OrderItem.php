<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Products\ProductExtraDisplay;
use Ordercloud\Entities\Products\ProductOptionDisplay;
use Ordercloud\Entities\Products\ProductPriceDiscount;

class OrderItem
{
    /** @var integer */
    private $id;
    /** @var float */
    private $price;
    /** @var integer */
    private $quantity;
    /** @var float */
    private $linePrice;
    /** @var boolean */
    private $enabled;
    /** @var OrderItemDetail */
    private $detail;
    /** @var OrderStatus */
    private $status;
    /** @var string */
    private $note;
    /** @var ProductPriceDiscount */
    private $itemDiscount;
    /** @var integer */
    private $readyEstimate;
    /**
     * @var array|ProductExtraDisplay[]
     * @reflectType Ordercloud\Entities\Products\ProductExtraDisplay
     */
    private $extras;
    /**
     * @var array|ProductOptionDisplay[]
     * @reflectType Ordercloud\Entities\Products\ProductOptionDisplay
     */
    private $options;

    public function __construct($id, $price, $quantity, $linePrice, $enabled, OrderItemDetail $detail, OrderStatus $status, $note, ProductPriceDiscount $itemDiscount = null, $readyEstimate, array $extras, array $options)
    {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->linePrice = $linePrice;
        $this->enabled = $enabled;
        $this->detail = $detail;
        $this->status = $status;
        $this->note = $note;
        $this->itemDiscount = $itemDiscount;
        $this->readyEstimate = $readyEstimate;
        $this->extras = $extras;
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the price per order item.
     * Including options & extras.
     * Excludes quantity.
     *
     * @return float
     */
    public function getPrice()
    {
        return floatval($this->price);
    }

    /**
     * Returns the total price of the order item.
     * Including quantity, options & extras.
     *
     * @return string
     */
    public function getLinePrice()
    {
        return floatval($this->linePrice);
    }

    /**
     * Returns the price of the product.
     * Excludes quantity, options & extras.
     *
     * @return float
     */
    public function getItemPrice()
    {
        return $this->getDetail()->getPrice();
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return OrderItemDetail
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @return OrderStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return ProductPriceDiscount
     */
    public function getItemDiscount()
    {
        return $this->itemDiscount;
    }

    /**
     * @return int
     */
    public function getReadyEstimate()
    {
        return $this->readyEstimate;
    }

    /**
     * @return array|ProductExtraDisplay[]
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @return bool
     */
    public function hasExtras()
    {
        return ! empty($this->extras);
    }

    /**
     * @return array|ProductOptionDisplay[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return bool
     */
    public function hasOptions()
    {
        return ! empty($this->options);
    }
}
