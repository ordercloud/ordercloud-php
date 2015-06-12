<?php namespace Ordercloud\Support;

use Closure;
use Illuminate\Container\Container;
use Ordercloud\Ordercloud;
use Ordercloud\Support\CommandBus\IlluminateCommandHandlerTranslator;
use Ordercloud\Support\Http\GuzzleClient;
use Ordercloud\Support\Http\LoggingClient;
use Psr\Log\LoggerInterface;

class OrdercloudBuilder
{
    /** @var Closure */
    private $clientFactory;
    /** @var Container */
    private $container;
    /**
     * @var array
     */
    private $config;

    /**
     * @param Container $container
     * @param array     $config
     */
    public function __construct(Container $container, array $config)
    {
        $this->config = $config;
        $this->container = $container;
        $self = $this;
        $this->clientFactory = function() use ($self) {
            return GuzzleClient::create(
                $self->getConfig('http.base_url'),
                $self->getConfig('credentials.username'),
                $self->getConfig('credentials.password'),
                $self->getConfig('credentials.organisation_token'),
                $self->getConfig('credentials.access_token')
            );
        };
        $this->registerComponents($container);
    }

    /**
     * Create a new instance of ordercloud
     *
     * @param array $config
     *
     * @return Ordercloud
     */
    public static function create(array $config)
    {
        $container = new Container();

        $builder = new static($container, $config);

        return $builder->build();
    }

    /**
     * Creates an instance of Ordercloud.
     *
     * @return Ordercloud
     */
    public function build()
    {
        return $this->container->make('Ordercloud\Ordercloud');
    }

    /**
     * @param LoggerInterface $logger
     */
    public function registerClientLogger(LoggerInterface $logger)
    {
        $self = $this;
        $clientFactory = $this->clientFactory;
        $this->container->singleton('Ordercloud\Support\Http\Client', function() use ($clientFactory, $logger, $self) {
            return new LoggingClient(
                $clientFactory(),
                $logger,
                $self->getConfig('logging.filtering.enabled', false),
                $self->getConfig('logging.filtering.urlPatterns', []),
                $self->getConfig('logging.filtering.methods', [])
            );
        });
    }

    /**
     * @param Container $container
     */
    protected function registerComponents(Container $container)
    {
        $container->singleton('Ordercloud\Support\Parser');
        $container->singleton('Ordercloud\Support\Http\UrlParameteriser', 'Ordercloud\Support\Http\LeagueUrlParameteriser');
        $container->singleton('Ordercloud\Support\CommandBus\CommandBus', 'Ordercloud\Support\CommandBus\ExecutingCommandBus');
        $container->singleton('Ordercloud\Support\Http\Client', $this->clientFactory);
        $container->singleton('Ordercloud\Support\CommandBus\CommandHandlerTranslator', function() use ($container)
        {
            return new IlluminateCommandHandlerTranslator($container);
        });
        $container->singleton('Ordercloud\Ordercloud', function() use ($container)
        {
            return new Ordercloud($container->make('Ordercloud\Support\CommandBus\CommandBus'), $container);
        });
    }

    /**
     * @param string     $key
     * @param mixed $default
     *
     * @return mixed
     */
    protected function getConfig($key, $default = null)
    {
        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }

        return $this->getDotNotationConfig($key, $default);
    }

    /**
     * Retreive a nested multidimentional array value.
     *
     * @param string     $key
     * @param mixed $default
     *
     * @return mixed
     */
    protected function getDotNotationConfig($key, $default)
    {
        $config = $this->config;

        foreach (explode('.', $key) as $segment) {
            if ( ! is_array($config) || ! array_key_exists($segment, $config)) {
                return $default;
            }
            $config = $config[$segment];
        }

        return $config;
    }
}
