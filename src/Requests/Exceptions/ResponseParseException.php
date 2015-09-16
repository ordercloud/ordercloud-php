<?php namespace Ordercloud\Requests\Exceptions;

use Ordercloud\OrdercloudException;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityParseException;

class ResponseParseException extends OrdercloudException
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response, EntityParseException $parseException)
    {
        parent::__construct('Failed to parse response', 0, $parseException);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->response->getRequest();
    }
}
