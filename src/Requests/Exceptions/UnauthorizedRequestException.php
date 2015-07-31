<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

class UnauthorizedRequestException extends OrdercloudRequestException
{
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
