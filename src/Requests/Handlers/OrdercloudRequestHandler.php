<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Client;
use Ordercloud\Support\Http\OrdercloudHttpException;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Http\UrlParameteriser;

class OrdercloudRequestHandler implements CommandHandler
{
    /** @var Client */
    private $client;
    /**
     * @var UrlParameteriser
     */
    private $parameteriser;

    public function __construct(Client $client, UrlParameteriser $parameteriser)
    {
        $this->client = $client;
        $this->parameteriser = $parameteriser;
    }

    /**
     * @param OrdercloudRequest $request
     *
     * @return Response
     *
     * @throws OrdercloudRequestException
     */
    public function handle($request)
    {
        $url = $this->prepareUrl($request);
        $method = $request->getMethod();
        $params = $this->prepareParameters($request);
        $headers = $request->getHeaders();

        try {
            return $this->client->send($url, $method, $params, $headers);
        }
        catch (OrdercloudHttpException $e) {
            throw OrdercloudRequestException::create($request, $e);
        }
    }

    /**
     * @param OrdercloudRequest $request
     *
     * @return string
     */
    protected function prepareUrl($request)
    {
        if ($request->isMethod(OrdercloudRequest::METHOD_GET)) {
            return $this->parameteriser->appendParametersToUrl($request->getParameters(), $request->getUrl());
        }

        return $request->getUrl();
    }

    /**
     * @param OrdercloudRequest $request
     *
     * @return array
     */
    protected function prepareParameters($request)
    {
        if ($request->isMethod(OrdercloudRequest::METHOD_GET)) {
            return [];
        }

        return $request->getParameters();
    }
}
