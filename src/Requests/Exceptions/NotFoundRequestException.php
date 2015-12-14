<?php namespace Ordercloud\Requests\Exceptions;

class NotFoundRequestException extends OrdercloudRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Not Found {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }
}
