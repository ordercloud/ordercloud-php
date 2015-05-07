<?php namespace Ordercloud\Requests;

use Ordercloud\Support\CommandBus\Command;

class OrdercloudRequest implements Command
{
    /** @var string */
    private $url;
    /** @var string */
    private $method;
    /** @var array */
    private $parameters;

    public function __construct($method, $url, array $parameters = [])
    {
        $this->url = $url;
        $this->method = $method;
        $this->parameters = array_filter($parameters);
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
}
