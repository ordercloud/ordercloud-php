<?php namespace Ordercloud;

use Illuminate\Container\Container;
use Ordercloud\Support\CommandBus\Command;
use Ordercloud\Support\CommandBus\CommandBus;
use Ordercloud\Support\Http\Client;

class Ordercloud
{
    const VERSION = '0.3';

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
     * @return mixed
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
