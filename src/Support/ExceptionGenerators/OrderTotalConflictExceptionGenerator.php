<?php namespace Ordercloud\Support\ExceptionGenerators;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\Exceptions\OrderTotalConflictException;
use Ordercloud\Support\Http\OrdercloudHttpException;

class OrderTotalConflictExceptionGenerator extends ExceptionGenerator
{
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        if ($exception->getResponse()->getData('error') === 'order_total_conflict') {
            return new OrderTotalConflictException($request, $exception);
        }

        return $this->next($request, $exception);
    }
}
