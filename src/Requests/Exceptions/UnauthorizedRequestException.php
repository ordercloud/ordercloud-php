<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

class UnauthorizedRequestException extends OrdercloudRequestException
{
    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     */
    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($request, $httpException);
        $this->message = "Unauthorized {$httpException->getCode()} {$httpException->getRequest()->getUrl()}";
    }

    public static function create(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        switch ($exception->getResponse()->getData('error')) {
            case 'expired_token':
                return new AccessTokenExpiredException($request, $exception);
            case 'invalid_token':
                return new InvalidAccessTokenException($request, $exception);
            default:
                return new static($request, $exception);
        }
    }
}
