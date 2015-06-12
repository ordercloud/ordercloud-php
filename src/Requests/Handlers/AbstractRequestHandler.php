<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\Response;

abstract class AbstractRequestHandler extends OrdercloudRequestHandler
{
    /**
     * @param OrdercloudRequest $request
     *
     * @return mixed|\Ordercloud\Support\Http\Response
     *
     * @throws \Ordercloud\Requests\Exceptions\UnauthorizedRequestException
     * @throws \Ordercloud\Requests\Exceptions\OrdercloudRequestException
     */
    public function handle($request)
    {
        $response = parent::handle(
            new OrdercloudRequest(
                $this->method,
                $this->getUrl($request),
                $this->getParameters($request),
                $this->getHeaders($request)
            )
        );

        return $this->transformResponse($response);
    }

    /**
     * @param $request
     *
     * @return string
     */
    abstract protected function getUrl($request);

    /**
     * @param $request
     *
     * @return array
     */
    protected function getParameters($request)
    {
        return [];
    }

    /**
     * @param $request
     *
     * @return array
     */
    protected function getHeaders($request)
    {
        return [];
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    abstract protected function transformResponse($response);
}
