<?php namespace Ordercloud\Support\Http;

use Psr\Log\LoggerInterface;

class LoggingClient implements Client
{
    /** @var Client */
    private $client;
    /** @var LoggerInterface */
    private $logger;

    /**
     * @param Client          $client
     * @param LoggerInterface $logger
     */
    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function send($url, $method, array $params, array $headers)
    {
        $response = $this->client->send($url, $method, $params, $headers);

        $this->logger->debug('OrdercloudRequest', [
            'rawResponse' => utf8_encode($response->getRawResponse()),
            'rawRequest'  => utf8_encode($response->getRequest()->getRawRequest()),
        ]);

        return $response;
    }

    public function setAccessToken($accessToken)
    {
        $this->client->setAccessToken($accessToken);
        $this->logger->debug('Ordercloud http client access token set', compact('accessToken'));
    }

    public function setOrganisationToken($organisationToken)
    {
        $this->client->setOrganisationToken($organisationToken);
        $this->logger->debug('Ordercloud http client organisation token set', compact('organisationToken'));
    }
}
