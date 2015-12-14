<?php namespace Ordercloud\Requests\Exceptions;

class AccessTokenExpiredException extends UnauthorizedRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Access Token Expired {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }
}
