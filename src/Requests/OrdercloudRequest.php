<?php namespace Ordercloud\Requests;

use Ordercloud\Support\CommandBus\Command;

class OrdercloudRequest implements Command
{
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';

    /** @var string */
    private $url;
    /** @var string */
    private $method;
    /** @var array */
    private $parameters;
    /** @var array */
    private $headers;

    public function __construct($method, $url, array $parameters = [], $headers = [])
    {
        $this->url = $url;
        $this->method = $method;
        $this->parameters = array_filter($parameters);
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
