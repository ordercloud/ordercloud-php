<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Exceptions\ResponseParseException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\ExceptionGenerators\ExceptionGeneratorService;
use Ordercloud\Support\Http\Client;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Http\UrlParameteriser;
use Ordercloud\Support\Reflection\EntityReflector;
use Ordercloud\Support\Reflection\Exceptions\EntityParseException;

abstract class AbstractRequestHandler extends OrdercloudRequestHandler
{
    protected $method;
    private $url;
    private $queryParameters = [];
    private $bodyParameters = [];
    private $formParameters = [];
    private $headers = [];
    private $entityClass;
    private $entityDataKey = null;
    /**
     * @var UrlParameteriser
     */
    private $parameteriser;

    public function __construct(Client $client, ExceptionGeneratorService $exceptionGenerator, UrlParameteriser $parameteriser)
    {
        parent::__construct($client, $exceptionGenerator);
        $this->parameteriser = $parameteriser;
    }

    /**
     * @param $request
     */
    abstract protected function configure($request);

    /**
     * @param OrdercloudRequest $request
     *
     * @return mixed|Response
     * @throws OrdercloudRequestException
     * @throws ResponseParseException
     */
    public function handle($request)
    {
        $this->configure($request);

        $response = parent::handle(
            new OrdercloudRequest($this->method, $this->getUrl(), $this->getParameters(), $this->getHeaders())
        );

        try {
            return $this->transformResponse($response);
        }
        catch (EntityParseException $e) {
            throw new ResponseParseException($response, $e);
        }
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    protected function transformResponse($response)
    {
        // TODO this needs to get out

        if ($this->entityDataKey) {
            return EntityReflector::parseAll($this->entityClass, $response->getData($this->entityDataKey));
        }

        if ($this->entityClass) {
            return EntityReflector::parse($this->entityClass, $response->getData());
        }

        return $response;
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
     * Set the parameters that should be passed via url.
     *
     * @param array $queryParameters
     *
     * @return static
     */
    public function setQueryParameters(array $queryParameters)
    {
        $this->queryParameters = $queryParameters;

        return $this;
    }

    /**
     * Set parameters that should be passed via body.
     *
     * @param array $bodyParameters
     *
     * @return static
     */
    public function setBodyParameters(array $bodyParameters)
    {
        $this->bodyParameters = $bodyParameters;

        return $this;
    }

    /**
     * Set parameters that should be passed via form encoded body.
     *
     * @param array $formParameters
     *
     * @return static
     */
    public function setFormParameters(array $formParameters)
    {
        $this->formParameters = $formParameters;

        return $this;
    }

    /**
     * Set a parameter that should be passed via body.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return static
     */
    protected function setBodyParameter($key, $value)
    {
        $this->bodyParameters[$key] = $value;

        return $this;
    }

    /**
     * Set a parameter that should be passed via url.
     *
     * @param string $key
     * @param string $value
     *
     * @return static
     */
    protected function setQueryParameter($key, $value)
    {
        $this->queryParameters[$key] = $value;

        return $this;
    }

    /**
     * Set a parameter that should be passed via form encoded body.
     *
     * @param string $key
     * @param string $value
     *
     * @return static
     */
    protected function setFormParameter($key, $value)
    {
        $this->formParameters[$key] = $value;

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

    /**
     * @return string
     */
    private function getUrl()
    {
        if (empty($this->queryParameters)) {
            return $this->url;
        }

        return $this->parameteriser->appendParametersToUrl($this->queryParameters, $this->url);
    }

    /**
     * @return array
     */
    private function getParameters()
    {
        if ( ! empty($this->formParameters)) {
            return $this->formParameters;
        }

        return $this->bodyParameters;
    }

    private function getHeaders()
    {
        if ( ! empty($this->formParameters)) {
            $this->setHeader('Content-type', 'application/x-www-form-urlencoded');
        }

        return $this->headers;
    }
}
