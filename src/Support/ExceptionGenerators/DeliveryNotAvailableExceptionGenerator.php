<?php namespace Ordercloud\Support\ExceptionGenerators;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\Exceptions\DeliveryNotAvailableException;
use Ordercloud\Support\Http\OrdercloudHttpException;

class DeliveryNotAvailableExceptionGenerator extends ExceptionGenerator
{
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        if ($exception->getResponse()->getData('error') === 'delivery_not_available') {
            return new DeliveryNotAvailableException($request, $exception);
        }

        return $this->next($request, $exception);
    }
}
