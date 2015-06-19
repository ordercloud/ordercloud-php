<?php namespace Ordercloud;

use Illuminate\Container\Container;
use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Entities\Organisations\OrganisationAccessToken;
use Ordercloud\Support\CommandBus\Command;
use Ordercloud\Support\CommandBus\CommandBus;
use Ordercloud\Support\Http\Client;
use Ordercloud\Support\Http\Response;

class Ordercloud
{
    const VERSION = '0.1';

    /** @var CommandBus */
    private $commandBus;
    /** @var Container */
    private $container;

    public function __construct(CommandBus $commandBus, Container $container)
    {
        $this->commandBus = $commandBus;
        $this->container = $container;
    }

    /**
     * @param Command $command
     *
     * @return Response
     */
    public function exec(Command $command)
    {
        return $this->commandBus->execute($command);
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
}
