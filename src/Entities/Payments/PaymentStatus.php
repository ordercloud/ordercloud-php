<?php namespace Ordercloud\Entities\Payments;

class PaymentStatus extends AbstractPaymentStatus
{
    const PENDING = 'PENDING';
    const PROCESSING = 'PROCESSING';
    const FAILED = 'FAILED';
    const SUCCESSFUL = 'SUCCESSFUL';
    const RESERVED = 'RESERVED';
    const REFUND = 'REFUND';
}
