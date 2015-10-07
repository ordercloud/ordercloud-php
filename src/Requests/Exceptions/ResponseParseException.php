<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\OrdercloudException;
use Ordercloud\Support\Http\Request;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\Exceptions\EntityParseException;

class ResponseParseException extends OrdercloudException
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response, EntityParseException $parseException)
    {
        parent::__construct('Failed to parse response', $response->getStatusCode(), $parseException);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->response->getRequest();
    }

    /**
     * @return EntityParseException
     */
    public function getParseException()
    {
        return $this->getPrevious();
    }
}
