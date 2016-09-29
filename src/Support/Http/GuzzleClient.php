<?php namespace Ordercloud\Support\Http;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Stream\Stream;
use Ordercloud\Ordercloud;

class GuzzleClient implements Client
{
    /** @var GuzzleHttpClient */
    private $client;

    /**
     * @param GuzzleHttpClient $client
     * @param string|null      $organisationToken
     * @param string|null      $accessToken
     */
    protected function __construct(GuzzleHttpClient $client, $organisationToken = null, $accessToken = null)
    {
        $this->client = $client;

        if ( ! is_null($organisationToken)) {
            $this->setOrganisationToken($organisationToken);
        }

        if ( ! is_null($accessToken)) {
            $this->setAccessToken($accessToken);
        }
    }

    /**
     * @param string      $baseUrl
     * @param string      $username
     * @param string      $password
     * @param string|null $organisationToken
     * @param string|null $accessToken
     *
     * @return static
     */
    public static function create($baseUrl, $username, $password, $organisationToken = null, $accessToken = null)
    {
        $client = new GuzzleHttpClient([
            'base_url' => $baseUrl,
            'defaults' => [
                'headers'         => [
                    'Content-Type' => 'application/json',
                    'User-Agent'   => 'ordercloud-php-v' . Ordercloud::VERSION,
                ],
                'auth'            => [$username, $password],
                'allow_redirects' => false,
                'config' =>[
                    'curl' => [
                        'CURLOPT_DNS_USE_GLOBAL_CACHE' => false
                        ]
                ]

            ],
        ]);

        return new static($client, $organisationToken, $accessToken);
    }

    public function send($url, $method, array $params, array $headers = [])
    {
        $guzzleRequest = $this->createGuzzleRequest($url, $method, $params, $headers);

        //remove the user credentials from the request
        $maskedRequest =  clone $guzzleRequest;
        $maskedRequest->setHeader("Authorization", "");
        $ordercloudRequest = new Request($url, $method, $params, $guzzleRequest->getHeaders(), (string) $maskedRequest);

        try {
            $guzzleResponse = $this->client->send($guzzleRequest);


            return $this->createResponse($guzzleResponse, $ordercloudRequest);
        }
        catch (BadResponseException $e) {
            throw OrdercloudHttpException::create($this->createResponse($e->getResponse(), $ordercloudRequest), $e);
        }
    }

    public function setAccessToken($accessToken)
    {
        $this->client->setDefaultOption('auth', null);
        $this->client->setDefaultOption('headers/Authorization', "Bearer {$accessToken}");
    }

    public function setOrganisationToken($organisationToken)
    {
        $this->client->setDefaultOption('headers/X-Ordercloud-Organisation', $organisationToken);
    }

    /**
     * @param string $url
     * @param string $method
     * @param array  $params
     * @param array  $headers
     *
     * @return RequestInterface
     */
    protected function createGuzzleRequest($url, $method, array $params, array $headers)
    {
        $guzzleRequest = $this->client->createRequest($method, $url, ['headers' => $headers, 'body' => $params]);

        if ($guzzleRequest->getHeader('Content-Type') == 'application/json' && sizeof($params) > 0) {
            $guzzleRequest->setBody(Stream::factory(json_encode($params)));
        }

        return $guzzleRequest;
    }

    /**
     * @param ResponseInterface $response
     * @param Request           $request
     *
     * @return Response
     */
    protected function createResponse(ResponseInterface $response, Request $request)
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
