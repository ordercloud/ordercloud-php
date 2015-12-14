<?php namespace Ordercloud\Requests\Exceptions;

class InvalidAccessTokenException extends UnauthorizedRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Invalid Access Token {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }
}
