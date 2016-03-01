<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Products\ProductExtraDisplay;
use Ordercloud\Entities\Products\ProductOptionDisplay;
use Ordercloud\Entities\Products\ProductPriceDiscount;

class OrderItem implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var float */
    private $price;
    /**
     * @var float
     */
    private $markup;
    /**
     * @var float
     */
    private $unitPrice;
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
    /** @var bool */
    private $instorePaymentRequired;

    public function __construct(
        $id,
        $price,
        $markup,
        $unitPrice,
        $quantity,
        $linePrice,
        $enabled,
        OrderItemDetail $detail,
        OrderStatus $status,
        $note,
        ProductPriceDiscount $itemDiscount = null,
        $readyEstimate,
        array $extras,
        array $options,
        $instorePaymentRequired
    )
    {
        $this->id = $id;
        $this->price = $price;
        $this->markup = $markup;
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
        $this->instorePaymentRequired = $instorePaymentRequired;
        $this->unitPrice = $unitPrice;
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
     * @return float
     */
    public function getMarkup()
    {
        return floatval($this->markup);
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return floatval($this->unitPrice);
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

    /**
     * @return bool
     */
    public function isInstorePaymentRequired()
    {
        return $this->instorePaymentRequired;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'price' => $this->getPrice(),
            'markup' => $this->getMarkup(),
            'unitPrice' => $this->getUnitPrice(),
            'quantity' => $this->getQuantity(),
            'linePrice' => $this->getLinePrice(),
            'enabled' => $this->isEnabled(),
            'detail' => $this->getDetail(),
            'status' => $this->getStatus(),
            'note' => $this->getNote(),
            'itemDiscount' => $this->getItemDiscount(),
            'readyEstimate' => $this->getReadyEstimate(),
            'extras' => $this->getExtras(),
            'options' => $this->getOptions(),
            'instorePaymentRequired' => $this->isInstorePaymentRequired(),
        ];
    }
}
