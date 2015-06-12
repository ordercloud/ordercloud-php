<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\Response;

abstract class AbstractRequestHandler extends OrdercloudRequestHandler
{
    protected $method;
    protected $url;
    protected $parameters = [];
    protected $headers = [];

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
     * @param $request
     */
    abstract protected function configure($request);

    /**
     * @param Response $response
     *
     * @return mixed
     */
    abstract protected function transformResponse($response);
}
