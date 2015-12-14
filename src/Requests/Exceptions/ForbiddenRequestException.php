<?php namespace Ordercloud\Requests\Exceptions;

class ForbiddenRequestException extends OrdercloudRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Forbidden {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }
}
