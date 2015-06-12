<?php namespace Ordercloud\Support\Http;

use Psr\Log\LoggerInterface;

class LoggingClient implements Client
{
    /** @var Client */
    private $client;
    /** @var LoggerInterface */
    private $logger;
    /** @var bool */
    private $filteringEnabled;
    /** @var array|string[] */
    private $loggingUrlPatterns;
    /** @var array|string[] */
    private $loggingMethods;

    /**
     * @param Client          $client
     * @param LoggerInterface $logger
     * @param bool            $filteringEnabled
     * @param array|string[]  $loggingUrlPatterns
     * @param array|string[]  $loggingMethods
     */
    public function __construct(Client $client, LoggerInterface $logger, $filteringEnabled, array $loggingUrlPatterns = [], array $loggingMethods = [])
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->filteringEnabled = $filteringEnabled;
        $this->loggingUrlPatterns = $loggingUrlPatterns;
        $this->loggingMethods = $loggingMethods;
    }

    public function send($url, $method, array $params, array $headers)
    {
        $shouldLog = $this->shouldLog($url, $method);

        if ($shouldLog) {
            $this->logger->info('ordercloud request', compact('url', 'method', 'params', 'headers'));
        }

        $response = $this->client->send($url, $method, $params, $headers);

        if ($shouldLog) {
            $this->logger->info(
                'ordercloud response',
                [
                    'rawResponse' => $response->getRawResponse(),
                    'rawRequest'  => $response->getRequest()->getRawRequest(),
                    'url'         => $response->getUrl(),
                    'headers'     => $response->getHeaders(),
                    'statusCode'  => $response->getStatusCode(),
                    'data'        => $response->getData(),
                ]
            );
        }

        return $response;
    }

    public function setAccessToken($accessToken)
    {
        $this->logger->info('ordercloud http client access token set', compact('accessToken'));
    }

    public function setOrganisationToken($organisationToken)
    {
        $this->logger->info('ordercloud http client organisation token set', compact('organisationToken'));
    }

    private function shouldLog($url, $method)
    {
        if ( ! $this->filteringEnabled || in_array($method, $this->loggingMethods)) {
            return true;
        }

        foreach ($this->loggingUrlPatterns as $urlPattern) {
            if (preg_match("/$urlPattern/", $url) === 1) {
                return true;
            }
        }

        return false;
    }
}
