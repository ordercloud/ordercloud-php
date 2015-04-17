<?php namespace Ordercloud\Orders;

use Ordercloud\Organisations\Organisation;
use Ordercloud\Users\User;
use Ordercloud\Users\UserGeo;

class Order
{
    /** @var integer */
    private $id;
    /** @var string */
    private $reference;
    /** @var string */
    private $shortReference;
    /** @var string */
    private $dateCreated;
    /** @var string */
    private $lastUpdated;
    /** @var OrderStatus */
    private $status;
    /** @var User */
    private $user;
    /** @var array|OrderPayment[] */
    private $paymentStatus;
    /** @var OrderPayment */
    private $currentPaymentStatus;
    /** @var Organisation */ // TODO short org
    private $organisation;
    /** @var array|OrderItem[] */
    private $items;
    /** @var string */
    private $deliveryType;
    /** @var array|Payment[] */
    private $payments;
    /** @var UserGeo */
    private $userGeo;
    /** @var undefined */ // TODO DeliveryAgent
    private $deliveryAgent;
    /** @var string */
    private $note;
    /** @var OrderPayment */ // TODO confirm if depricated due to $currentPaymentStatus
    private $lastPaymentStatus;
    /** @var float */
    private $amount;
}
