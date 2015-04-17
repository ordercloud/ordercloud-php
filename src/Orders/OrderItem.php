<?php namespace Ordercloud\Orders;

class OrderItem
{
    /** @var integer */
    private $id;
    /** @var number */
    private $price;
    /** @var integer */
    private $quantity;
    /** @var boolean */
    private $enabled;
    /** @var undefined */
    private $product;
    /** @var undefined */
    private $status;
    /** @var undefined */
    private $order;
    /** @var string */
    private $note;
    /** @var integer */
    private $readyEstimate;
    /** @var array|OrderItemOption[] */
    private $itemOptions;
    /** @var array|OrderItemExtra[] */
    private $itemExtras;
    /** @var undefined */
    private $itemDiscount;
}
