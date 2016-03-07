<?php namespace Ordercloud;

use Illuminate\Container\Container;
use Ordercloud\Services\AuthService;
use Ordercloud\Services\ConnectionService;
use Ordercloud\Services\OrderService;
use Ordercloud\Services\OrganisationService;
use Ordercloud\Services\PaymentService;
use Ordercloud\Services\ProductService;
use Ordercloud\Services\ProductTagService;
use Ordercloud\Services\UserService;
use Ordercloud\Support\CommandBus\Command;
use Ordercloud\Support\CommandBus\CommandBus;
use Ordercloud\Support\Http\Client;

class Ordercloud
{
    const VERSION = '1.5';

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
     * @return AuthService
     */
    public function auth()
    {
        return $this->container->make('Ordercloud\Services\AuthService');
    }

    /**
     * @return ConnectionService
     */
    public function connections()
    {
        return $this->container->make('Ordercloud\Services\ConnectionService');
    }

    /**
     * @return OrganisationService
     */
    public function organisations()
    {
        return $this->container->make('Ordercloud\Services\OrganisationService');
    }

    /**
     * @return OrderService
     */
    public function orders()
    {
        return $this->container->make('Ordercloud\Services\OrderService');
    }

    /**
     * @return PaymentService
     */
    public function payments()
    {
        return $this->container->make('Ordercloud\Services\PaymentService');
    }

    /**
     * @return ProductService
     */
    public function products()
    {
        return $this->container->make('Ordercloud\Services\ProductService');
    }

    /**
     * @return ProductTagService
     */
    public function productTags()
    {
        return $this->container->make('Ordercloud\Services\ProductTagService');
    }

    /**
     * @return UserService
     */
    public function users()
    {
        return $this->container->make('Ordercloud\Services\UserService');
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
