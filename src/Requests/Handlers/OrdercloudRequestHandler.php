<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\OrdercloudRequestException;
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
            $url = $this->appendParametersToUrl($params, $url);
            $params = [];
        }

        try {
            return $this->client->send($url, $method, $params, $headers);
        }
        catch (OrdercloudHttpException $e) {
            throw new OrdercloudRequestException($request, $e);
        }
    }

    //TODO: look into UrlParameteriser & http://url.thephpleague.com/3.0/overview/
    private function appendParametersToUrl(array $params, $url)
    {
        if (empty($params)) {
            return $url;
        }

        if (strpos($url, '?') !== false) {
            list($url, $queryString) = explode('?', $url, 2);
            parse_str($queryString, $queryArray);

            // Favor params from the original URL over $parameters
            $params = array_merge($params, $queryArray);
        }

        return $url . '?' . $this->parameteriser->parameterise($params);
    }
}
