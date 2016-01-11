<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;
use Ordercloud\Entities\Payments\AbstractPaymentStatus;

class OrderPaymentStatus extends AbstractPaymentStatus implements JsonSerializable
{
    const UNPAID = 'UNPAID';
    const PARTLY_PAID = 'PARTLY_PAID';
    const DEPOSIT_PAID = 'DEPOSIT_PAID';
    const PAID = 'PAID';
    const ACCOUNT = 'ACCOUNT';
}
