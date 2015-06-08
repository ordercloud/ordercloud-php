<?php namespace Ordercloud\Support\Http;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Stream\Stream;

class GuzzleClient implements Client
{
    /** @var GuzzleHttpClient */
    private $client;

    public function __construct($baseUrl, $username, $password, $organisationToken = null)
    {
        $this->client = new GuzzleHttpClient([
            'base_url' => $baseUrl,
            'defaults' => [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'User-Agent'   => 'ordercloud-php', //TODO add client version??
                ],
                'auth' => [$username, $password],
                'allow_redirects' => false,
            ],
        ]);

        if ($organisationToken) {
            $this->client->setDefaultOption('headers/X-Ordercloud-Organisation', $organisationToken);
        }
    }

    public function send($url, $method, array $params, array $headers = [])
    {
        $guzzleRequest = $this->client->createRequest(
            $method,
            $url,
            [
                'headers' => $headers,
                'body'    => $params
            ]
        );

        if ($guzzleRequest->getHeader('Content-Type') == 'application/json') {
            $guzzleRequest->setBody(Stream::factory(json_encode($params)));
        }

        $ordercloudRequest = new Request($url, $method, $params, $guzzleRequest->getHeaders(), (string) $guzzleRequest);

        try {
            $guzzleResponse = $this->client->send($guzzleRequest);
            return $this->createResponse($guzzleResponse, $ordercloudRequest);
        }
        catch (BadResponseException $e) {
            throw new OrdercloudHttpException(
                $this->createResponse($e->getResponse(), $ordercloudRequest),
                $ordercloudRequest,
                $e
            );
        }
    }

    /**
     * @param ResponseInterface $response
     * @param Request           $request
     *
     * @return Response
     */
    private function createResponse(ResponseInterface $response, Request $request)
    {
        $data = json_decode($response->getBody(), true);

        return new Response(
            $response->getHeader('location'),
            (string) $response->getBody(),
            $data ?: [],
            $response->getStatusCode(),
            $response->getHeaders(),
            (string) $response,
            $request
        );
    }
}
