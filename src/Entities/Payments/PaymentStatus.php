<?php namespace Ordercloud\Entities\Payments;

use JsonSerializable;

class PaymentStatus extends AbstractPaymentStatus implements JsonSerializable
{
    const PENDING = 'PENDING';
    const PROCESSING = 'PROCESSING';
    const FAILED = 'FAILED';
    const SUCCESSFUL = 'SUCCESSFUL';
    const RESERVED = 'RESERVED';
    const REFUND = 'REFUND';
}
