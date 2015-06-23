<?php namespace Ordercloud;

use Illuminate\Container\Container;
use Ordercloud\Support\CommandBus\Command;
use Ordercloud\Support\CommandBus\CommandBus;
use Ordercloud\Support\Http\Client;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\TokenRefresher;

class Ordercloud
{
    const VERSION = '0.1';

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param Command $command
     *
     * @return Response
     */
    public function exec(Command $command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * @param string $token
     */
    public function setAccessToken($token)
    {
        $this->getHttpClient()->setAccessToken($token);
    }

    /**
     * @param string $token
     */
    public function setOrganisationToken($token)
    {
        $this->getHttpClient()->setOrganisationToken($token);
    }

    /**
     * @param TokenRefresher $refresher
     */
    public function setInvalidAccessTokenHandler(TokenRefresher $refresher)
    {
        // TODO move this out
        $tokenRefreshingCommandBus = $this->container->make('Ordercloud\Support\CommandBus\TokenRefreshingCommandBus');
        $this->container->singleton('Ordercloud\Support\CommandBus\CommandBus', function () use ($tokenRefreshingCommandBus) {
            return $tokenRefreshingCommandBus;
        });
        $this->container->singleton('Ordercloud\Support\TokenRefresher', function () use ($refresher) {
            return $refresher;
        });
    }

    /**
     * @return Client
     */
    protected function getHttpClient()
    {
        return $this->container->make('Ordercloud\Support\Http\Client');
    }

    /**
     * @return CommandBus
     */
    protected function getCommandBus()
    {
        return $this->container->make('Ordercloud\Support\CommandBus\CommandBus');
    }
}
