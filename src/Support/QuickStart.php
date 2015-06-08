<?php namespace Ordercloud\Support;

use Illuminate\Container\Container;
use Ordercloud\Ordercloud;
use Ordercloud\Support\CommandBus\IlluminateCommandHandlerTranslator;
use Ordercloud\Support\Http\GuzzleClient;
use Ordercloud\Support\Http\LoggingClient;
use Psr\Log\LoggerInterface;

class QuickStart
{
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
        $self = $this;
        $container->singleton('Ordercloud\Ordercloud');
        $container->singleton('Ordercloud\Support\Parser');
        $container->singleton('Ordercloud\Support\Http\UrlParameteriser', 'Ordercloud\Support\Http\LeagueUrlParameteriser');
        $container->singleton('Ordercloud\Support\CommandBus\CommandBus', 'Ordercloud\Support\CommandBus\ExecutingCommandBus');
        $container->singleton('Ordercloud\Support\CommandBus\CommandHandlerTranslator', function() use ($container) {
            return new IlluminateCommandHandlerTranslator($container);
        });
        $container->singleton('Ordercloud\Support\Http\Client', function() use ($self) {
            return new GuzzleClient(
                $self->getConfig('http.base_url'),
                $self->getConfig('credentials.username'),
                $self->getConfig('credentials.password'),
                $self->getConfig('credentials.organisation_token')
            );
        });
        $this->container = $container;
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

        $quickStart = new static($container, $config);

        return $quickStart->make();
    }

    /**
     * Creates an instance of Ordercloud.
     *
     * @return Ordercloud
     */
    public function make()
    {
        return $this->container->make('Ordercloud\Ordercloud');
    }

    /**
     * @param LoggerInterface $logger
     */
    public function registerClientLogger(LoggerInterface $logger)
    {
        $self = $this;
        $this->container->singleton('Ordercloud\Support\Http\Client', function () use ($logger, $self) {
            $client = $self->container->make('Ordercloud\Support\Http\Client');

            return new LoggingClient(
                $client,
                $logger,
                $self->getConfig('logging.filtering.enabled', false),
                $self->getConfig('logging.filtering.urlPatterns', array()),
                $self->getConfig('logging.filtering.methods', array())
            );
        });
    }

    /**
     * @param string     $key
     * @param mixed $default
     *
     * @return mixed
     */
    private function getConfig($key, $default = null)
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
    private function getDotNotationConfig($key, $default)
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
