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
     * @param AccessToken $token
     */
    public function setAccessToken(AccessToken $token)
    {
        $this->getHttpClient()->setAccessToken($token->getAccessToken());
    }

    /**
     * @param OrganisationAccessToken $token
     */
    public function setOrganisationToken(OrganisationAccessToken $token)
    {
        $this->getHttpClient()->setOrganisationToken($token->getToken());
    }

    /**
     * @return Client
     */
    protected function getHttpClient()
    {
        return $this->container->make('Ordercloud\Support\Http\Client');
    }
}
