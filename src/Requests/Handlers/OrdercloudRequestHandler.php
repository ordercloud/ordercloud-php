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
        $url = $request->getUrl();
        $method = $request->getMethod();
        $params = $request->getParameters();
        $headers = $request->getHeaders();

        if (strtoupper($method) == 'GET') {
            $url = $this->parameteriser->appendParametersToUrl($params, $url);
            $params = [];
        }
        elseif (isset($params['access_token'])) {
            $access_token = $params['access_token'];
            unset($params['access_token']);
            $url = $this->parameteriser->appendParametersToUrl(compact('access_token'), $url);
        }

        try {
            return $this->client->send($url, $method, $params, $headers);
        }
        catch (OrdercloudHttpException $e) {
            throw OrdercloudRequestException::create($request, $e);
        }
    }
}
