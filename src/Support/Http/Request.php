<?php namespace Ordercloud\Support\Http;

class Request
{
    /** @var string */
    private $url;
    /** @var string */
    private $method;
    /** @var array */
    private $parameters;
    /** @var array */
    private $headers;
    /** @var string */
    private $rawRequest;

    public function __construct($url, $method, $parameters, array $headers, $rawRequest)
    {
        $this->url = $url;
        $this->method = $method;
        $this->parameters = $parameters;
        $this->headers = $headers;
        $this->rawRequest = $rawRequest;
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

    /**
     * @return string
     */
    public function getRawRequest()
    {
        return $this->rawRequest;
    }

    public function __toString()
    {
        return $this->getRawRequest();
    }
}
