<?php namespace Ordercloud\Support\CommandBus;

use Illuminate\Container\BindingResolutionException;
use Illuminate\Container\Container;

class IlluminateCommandHandlerResolver implements CommandHandlerResolver
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container              $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function resolve(Command $command, $handlerClass)
    {
        if ( ! class_exists($handlerClass)) {
            throw new CommandHandlerNotFoundException($command, $handlerClass);
        }

        try {
            return $this->container->make($handlerClass);
        }
        catch (BindingResolutionException $e) {
            throw new CommandHandlerNotResolvableException($command, $handlerClass, $e);
        }
    }
}
