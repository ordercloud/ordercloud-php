<?php namespace Ordercloud\Support\Http;

use Exception;
use Ordercloud\OrdercloudException;

class OrdercloudHttpException extends OrdercloudException
{
    /**
     * @var Response
     */
    private $response;
    /**
     * @var Request
     */
    private $request;

    public function __construct(Response $response, Request $request, Exception $previousException = null)
    {
        $message = $response->getData('error_description', false);
        if ( ! $message) {
            $message = $previousException ? $previousException->getMessage() : 'Unkown error.';
        }

        parent::__construct($message, $response->getStatusCode(), $previousException);

        $this->response = $response;
        $this->request = $request;
    }

    /**
     * @param Response  $response
     * @param Exception $previousException
     *
     * @return static
     */
    public static function create(Response $response, Exception $previousException = null)
    {
        return new static($response, $response->getRequest(), $previousException);
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
        return $this->request;
    }
}
