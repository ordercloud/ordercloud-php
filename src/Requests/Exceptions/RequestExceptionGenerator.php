<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\ExceptionGenerators\ExceptionGenerator;
use Ordercloud\Support\Http\OrdercloudHttpException;

class RequestExceptionGenerator extends ExceptionGenerator
{
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        switch ($exception->getCode()) {
            case 400:
                return new BadRequestException($request, $exception);
            case 401:
                return UnauthorizedRequestException::create($request, $exception);
            case 403:
                return new ForbiddenRequestException($request, $exception);
            case 404:
                return new NotFoundRequestException($request, $exception);
            default:
                if ($exception->getCode() >= 500) {
                    return new ServerErrorRequestException($request, $exception);
                }
                return new OrdercloudRequestException($request, $exception);
        }
    }
}
