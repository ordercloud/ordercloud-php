<?php namespace Ordercloud\Support\Http;

class Response
{
    /** @var string */
    private $url;
    /** @var array */
    private $data;
    /** @var integer */
    private $statusCode;
    /** @var string */
    private $rawResult;
    /** @var array */
    private $headers;
    /** @var string */
    private $rawResponse;
    /** @var Request */
    private $request;

    public function __construct($url, $rawResult, array $data, $statusCode, array $headers, $rawResponse, Request $request)
    {
        $this->url = $url;
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->rawResult = $rawResult;
        $this->headers = $headers;
        $this->rawResponse = $rawResponse;
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * If no key is specified, reeturn all the response data.
     * Otherwise return the value at the specified index.
     *
     * @param string $key
     * @param mixed  $default The default value to return if the key is not set.
     *
     * @return mixed
     */
    public function getData($key = null, $default = null)
    {
        if (is_null($key)) {
            return $this->data;
        }

        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return $default;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getRawResult()
    {
        return $this->rawResult;
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
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    public function __toString()
    {
        return $this->getRawResponse();
    }
}
