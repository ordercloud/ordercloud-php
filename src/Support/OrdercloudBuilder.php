<?php namespace Ordercloud\Support;

use Illuminate\Container\Container;
use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Ordercloud;
use Ordercloud\Support\CommandBus\ArrayCommandHandlerTranslator;
use Ordercloud\Support\CommandBus\IlluminateCommandHandlerResolver;
use Ordercloud\Support\CommandBus\ReflectionCommandHandlerTranslator;
use Ordercloud\Support\Http\GuzzleClient;
use Ordercloud\Support\Http\LoggingClient;
use Psr\Log\LoggerInterface;

class OrdercloudBuilder
{
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $organisationToken;
    /**
     * @var AccessToken
     */
    private $accessToken;
    /**
     * @var TokenRefresher
     */
    private $tokenRefresher;
    /**
     * @var LoggerInterface
     */
    private $clientLogger;
    /**
     * @var array
     */
    private $filterUrls;
    /**
     * @var array
     */
    private $filterMethods;
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
     * @return static
     */
    public static function create()
    {
        return new static(new Container());
    }

    /**
     * @return Ordercloud
     */
    public function getOrdercloud()
    {
        $this->registerComponents($this->container);

        return $this->container->make('Ordercloud\Ordercloud');
    }

    /**
     * @param $baseUrl
     *
     * @return static
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param $username
     *
     * @return static
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param $password
     *
     * @return static
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param $organisationToken
     *
     * @return static
     */
    public function setOrganisationToken($organisationToken)
    {
        $this->organisationToken = $organisationToken;

        return $this;
    }

    /**
     * @param AccessToken $accessToken
     *
     * @return static
     */
    public function setAccessToken(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @param LoggerInterface $logger
     * @param array           $filterUrls
     * @param array           $filterMethods
     *
     * @return static
     */
    public function registerClientLogger(LoggerInterface $logger, array $filterUrls = [], array $filterMethods = [])
    {
        $this->clientLogger = $logger;
        $this->filterUrls = $filterUrls;
        $this->filterMethods = $filterMethods;

        return $this;
    }

    /**
     * @param TokenRefresher $tokenRefresher
     *
     * @return static
     */
    public function setTokenRefresher(TokenRefresher $tokenRefresher)
    {
        $this->tokenRefresher = $tokenRefresher;

        return $this;
    }

    /**
     * @param Container $container
     *
     * @return static
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Register all ordercloud components on the specified Container.
     *
     * @param Container $container
     */
    public function registerComponents(Container $container)
    {
        $this->bindClient($container);

        $this->bindCommandBus($container);

        $container->singleton('Ordercloud\Support\Parser');

        $container->singleton('Ordercloud\Ordercloud', function () use ($container)
        {
            return new Ordercloud($container);
        });
    }

    /**
     * @param Container $container
     */
    protected function bindClient(Container $container)
    {
        $container->singleton('Ordercloud\Support\Http\UrlParameteriser', 'Ordercloud\Support\Http\LeagueUrlParameteriser');

        $clientFactory = $this->createClientFactory();

        if (isset($this->clientLogger)) {
            $this->bindLoggingClient($container, $clientFactory);
        }
        else {
            $container->singleton('Ordercloud\Support\Http\Client', $clientFactory);
        }
    }

    /**
     * @param Container $container
     */
    protected function bindCommandBus(Container $container)
    {
        $this->container->singleton('Ordercloud\Support\CommandBus\CommandHandlerResolver', function () use ($container)
        {
            return new IlluminateCommandHandlerResolver($container);
        });

        $this->container->singleton('Ordercloud\Support\CommandBus\CommandHandlerTranslator', function ()
        {
            $reflectionTranslator = new ReflectionCommandHandlerTranslator();

            return new ArrayCommandHandlerTranslator($reflectionTranslator, [
                'Ordercloud\Requests\Connections\GetMarketplaceConnectionsRequest' => 'Ordercloud\Requests\Connections\Handlers\GetConnectionsByTypeRequestHandler',
                'Ordercloud\Requests\Connections\GetChildConnectionsRequest' => 'Ordercloud\Requests\Connections\Handlers\GetConnectionsByTypeRequestHandler',
                'Ordercloud\Requests\Auth\GetLoginUrlRequest' => 'Ordercloud\Requests\Auth\Handlers\GetUrlRequestHandler',
                'Ordercloud\Requests\Auth\GetRegisterUrlRequest' => 'Ordercloud\Requests\Auth\Handlers\GetUrlRequestHandler',
            ]);
        });

        $container->singleton('Ordercloud\Support\CommandBus\CommandBus', 'Ordercloud\Support\CommandBus\ExecutingCommandBus');

        if (isset($this->tokenRefresher)) {
            $this->bindTokenRefreshingCommandBus($container);
        }
    }

    /**
     * @param Container $container
     */
    protected function bindTokenRefreshingCommandBus(Container $container)
    {
        $container->singleton('Ordercloud\Support\CommandBus\CommandBus', function () use ($container)
        {
            return $container->make('Ordercloud\Support\CommandBus\TokenRefreshingCommandBus');
        });

        $refresher = $this->tokenRefresher;

        $container->singleton('Ordercloud\Support\TokenRefresher', function () use ($refresher)
        {
            return $refresher;
        });
    }

    /**
     * @return \Closure
     */
    protected function createClientFactory()
    {
        $url = $this->baseUrl;
        $username = $this->username;
        $password = $this->password;
        $orgToken = $this->organisationToken;
        $accessToken = $this->accessToken;

        return function () use ($url, $username, $password, $orgToken, $accessToken)
        {
            return GuzzleClient::create($url, $username, $password, $orgToken, $accessToken);
        };
    }

    /**
     * @param Container $container
     * @param \Closure  $clientFactory
     */
    protected function bindLoggingClient(Container $container, $clientFactory)
    {
        $logger = $this->clientLogger;
        $filterUrls = $this->filterUrls;
        $filterMethods = $this->filterMethods;

        $container->singleton('Ordercloud\Support\Http\Client', function () use ($clientFactory, $logger, $filterUrls, $filterMethods)
        {
            return new LoggingClient($clientFactory(), $logger, $filterUrls, $filterMethods);
        });
    }
}
