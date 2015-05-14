<?php namespace Ordercloud\Support\Http;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Message\ResponseInterface;

class GuzzleClient implements Client
{
    /** @var \GuzzleHttp\Client */
    private $client;
    /** @var UrlParameteriser */
    private $parameteriser;

    public function __construct($baseUrl, $username, $password, $accessToken)
    {
        // TODO: Think we should inject
        $this->client = new \GuzzleHttp\Client([
            'base_url' => $baseUrl,
            'defaults' => [
                'headers' => [
                    'Content-type' => 'application/json',
                    'User-Agent'   => 'ordercloud-php' //TODO add client version
                ],
                'auth' => [ $username, $password ],
                'allow_redirects' => false,
            ],
        ]);

        if (!empty($accessToken)) {
            $this->client->setDefaultOption('query', ['access_token' => $accessToken]);
        }
    }

    public function send($url, $method, array $params, array $headers = [])
    {
        $options = [];

        if ( ! empty($params)) {
            $options['body'] = $params;
        }

        if ( ! empty($headers)) {
            $options['headers'] = $headers;
        }

        $guzzleRequest = $this->client->createRequest(
            $method,
            $url,
            $options
        );

        try {
            $guzzleResponse = $this->client->send($guzzleRequest);
            return $this->createResponse($guzzleResponse);
        }
        catch (BadResponseException $e) {
            throw new OrdercloudHttpException(
                $this->createResponse($e->getResponse()),
                new Request($url, $method, $params, $guzzleRequest->getHeaders(), (string) $guzzleRequest),
                $e
            );
        }
    }

    /**
     * @param ResponseInterface $response
     *
     * @return Response
     */
    private function createResponse(ResponseInterface $response)
    {
        $data = $response->json();

        return new Response(
            $response->getHeader('location'),
            (string) $response->getBody(),
            $response->json() ?: [],
            $response->getStatusCode(),
            $response->getHeaders(),
            (string) $response
        );
    }
}
