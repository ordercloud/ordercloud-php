<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\Response;

abstract class AbstractRequestHandler extends OrdercloudRequestHandler
{
    protected $method;
    private $url;
    private $parameters = [];
    private $headers = [];
    private $entityClass = 'Ordercloud\Entities\Users\UserProfile';
    private $entityDataKey = null;

    /**
     * @param $request
     */
    abstract protected function configure($request);

    /**
     * @param $request
     *
     * @return mixed|\Ordercloud\Support\Http\Response
     *
     * @throws \Ordercloud\Requests\Exceptions\UnauthorizedRequestException
     * @throws \Ordercloud\Requests\Exceptions\OrdercloudRequestException
     */
    public function handle($request)
    {
        $this->configure($request);

        $response = parent::handle(
            new OrdercloudRequest($this->method, $this->url, $this->parameters, $this->headers)
        );

        return $this->transformResponse($response);
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    protected function transformResponse($response)
    {
        return EntityReflector::parse($this->entityClass, $response->getData($this->entityDataKey));
    }

    /**
     * Set the url. Optionally apply the sprintf function to
     * the url supplied by a variable number of arguments.
     *
     * @param string $url
     * @param mixed  $args [optional]
     *
     * @return static
     */
    protected function setUrl($url, $args = null)
    {
        $this->url = call_user_func_array('sprintf', func_get_args());

        return $this;
    }

    /**
     * @param array $parameters
     *
     * @return static
     */
    protected function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return static
     */
    protected function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * @param array $headers
     *
     * @return static
     */
    protected function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return static
     */
    protected function setHeader($key, $value)
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * @param string $className
     *
     * @return static
     */
    protected function setEntityClass($className)
    {
        $this->entityClass = $className;

        return $this;
    }

    /**
     * @param string $className
     *
     * @return static
     */
    protected function setEntityArrayClass($className)
    {
        return $this->setEntityClass($className)
            ->setEntityDataKey('results');
    }

    /**
     * @param string $entityDataKey
     *
     * @return static
     */
    public function setEntityDataKey($entityDataKey)
    {
        $this->entityDataKey = $entityDataKey;

        return $this;
    }
}
