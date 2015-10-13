<?php namespace Ordercloud\Requests\Orders\Exceptions;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\ExceptionGenerators\ExceptionGenerator;
use Ordercloud\Support\Http\OrdercloudHttpException;

class OrderExceptionGenerator extends ExceptionGenerator
{
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        switch ($exception->getResponse()->getData('error')) {
            case 'order_total_conflict': return new OrderTotalConflictException($request, $exception);
            case 'delivery_not_available': return new DeliveryNotAvailableException($request, $exception);
        }

        return $this->next($request, $exception);
    }
}
