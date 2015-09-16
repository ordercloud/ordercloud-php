<?php namespace Ordercloud\Support\ExceptionGenerators;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

interface ExceptionGeneratorService
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $exception
     *
     * @return OrdercloudRequestException
     */
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception);
}
