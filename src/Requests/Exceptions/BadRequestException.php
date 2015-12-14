<?php namespace Ordercloud\Requests\Exceptions;

class BadRequestException extends OrdercloudRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Bad Request {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }
}
