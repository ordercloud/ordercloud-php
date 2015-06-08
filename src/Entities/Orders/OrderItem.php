<?php namespace Ordercloud\Entities\Orders;

use Ordercloud\Entities\Products\ProductPriceDiscount;
use Ordercloud\Entities\Products\ProductShort;

class OrderItem
{
    /** @var integer */
    private $id;
    /** @var float */
    private $price;
    /** @var integer */
    private $quantity;
    /** @var boolean */
    private $enabled;
    /** @var ProductShort */
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
     * @var array|OrderItemExtra[]
     * @reflectType Ordercloud\Entities\Orders\OrderItemExtra
     */
    private $extras;
    /**
     * @var array|OrderItemOption[]
     * @reflectType Ordercloud\Entities\Orders\OrderItemOption
     */
    private $options;

    public function __construct($id, $price, $quantity, $enabled, ProductShort $detail, OrderStatus $status, $note, ProductPriceDiscount $itemDiscount = null, $readyEstimate, array $extras, array $options)
    {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
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
     * Returns the price of the item / product.
     * Excludes quantity, options & extras.
     *
     * @return float
     *
     * @see OrderItem::getOrderItemPrice()
     */
    public function getItemPrice()
    {
        return $this->price;
    }

    /**
     * Returns the price of the order item.
     * Including options & extras.
     * Excluding quantity.
     *
     * @return float
     *
     * @see OrderItem::getItemPrice()
     */
    public function getOrderItemPrice()
    {
        $price = $this->getItemPrice();

        foreach ($this->getOptions() as $option) {
            $price = bcadd($price, $option->getPrice(), 2);
        }

        foreach ($this->getExtras() as $extra) {
            $price = bcadd($price, $extra->getPrice(), 2);
        }

        return round($price, 2);
    }

    /**
     * Returns the total price of the order item.
     * Including quantity, options & extras.
     *
     * @return string
     */
    public function getTotalOrderItemPrice()
    {
        $totalPrice = bcmul($this->getOrderItemPrice(), $this->getQuantity(), 2);

        return floatval($totalPrice);
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
     * @return ProductShort
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
     * @return array|OrderItemExtra[]
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
     * @return array|OrderItemOption[]
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
