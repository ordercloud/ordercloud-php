<?php namespace Ordercloud\Orders;

use Ordercloud\Organisations\OrganisationShort;
use Ordercloud\Products\ProductPriceDiscount;
use Ordercloud\Products\ProductShort;

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
    /** @var array|OrderItemExtra[] */
    private $extras;
    /** @var array|OrderItemOption[] */
    private $options;

    function __construct($id, $price, $quantity, $enabled, ProductShort $detail, OrderStatus $status, $note, ProductPriceDiscount $itemDiscount, $readyEstimate, array $extras, array $options)
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
}
