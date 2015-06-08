<?php namespace Ordercloud\Support\CommandBus;

use Illuminate\Container\Container;
use ReflectionClass;

class IlluminateCommandHandlerTranslator implements CommandHandlerTranslator
{
    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param Command $command
     *
     * @return CommandHandler
     *
     * @throws CommandHandlerNotFoundException
     */
    public function resolve(Command $command)
    {
        $commandClass = new ReflectionClass($command);

        $handlerClass = sprintf('%s\\Handlers\\%sHandler', $commandClass->getNamespaceName(), $commandClass->getShortName());

        if ( ! class_exists($handlerClass)) {
            throw new CommandHandlerNotFoundException($command, $handlerClass);
        }

        return $this->container->make($handlerClass);
    }
}
