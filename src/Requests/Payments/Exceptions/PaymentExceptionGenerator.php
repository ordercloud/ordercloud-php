<?php namespace Ordercloud\Requests\Payments\Exceptions;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\ExceptionGenerators\ExceptionGenerator;
use Ordercloud\Support\Http\OrdercloudHttpException;

class PaymentExceptionGenerator extends ExceptionGenerator
{
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        switch ($exception->getResponse()->getData('error')) {
            case 'credit_card_payment_failed': return new CreditCardPaymentFailedException($request, $exception);
        }

        return $this->next($request, $exception);
    }
}
