<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\OrdercloudException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

class OrdercloudRequestException extends OrdercloudException
{
    /**
     * @var OrdercloudRequest
     */
    private $request;
    /**
     * @var OrdercloudHttpException
     */
    private $httpException;

    public function __construct(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        parent::__construct($httpException->getMessage(), $httpException->getCode());
        $this->request = $request;
        $this->httpException = $httpException;
    }

    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $httpException
     *
     * @return UnauthorizedRequestException|static
     */
    public static function create(OrdercloudRequest $request, OrdercloudHttpException $httpException)
    {
        switch ($httpException->getCode()) {
            case 401:
                return new UnauthorizedRequestException($request, $httpException);
            default:
                return new static($request, $httpException);
        }
    }

    /**
     * @return OrdercloudRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return OrdercloudHttpException
     */
    public function getHttpException()
    {
        return $this->httpException;
    }
}
