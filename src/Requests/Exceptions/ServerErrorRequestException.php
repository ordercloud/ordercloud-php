<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

class ServerErrorRequestException extends OrdercloudRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Server Error {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }
}
