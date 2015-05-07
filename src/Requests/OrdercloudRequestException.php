<?php namespace Ordercloud\Requests;

use Exception;
use Ordercloud\OrdercloudException;
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
