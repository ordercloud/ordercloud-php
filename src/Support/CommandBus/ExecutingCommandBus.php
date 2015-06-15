<?php namespace Ordercloud\Support\CommandBus;

class ExecutingCommandBus implements CommandBus
{
    /**
     * @var CommandHandlerTranslator
     */
    private $commandHandlerTransalator;
    /**
     * @var CommandHandlerResolver
     */
    private $commandHandlerResolver;

    /**
     * @param CommandHandlerTranslator $commandHandlerTransalator
     * @param CommandHandlerResolver   $commandHandlerResolver
     */
    public function __construct(CommandHandlerTranslator $commandHandlerTransalator, CommandHandlerResolver $commandHandlerResolver)
    {
        $this->commandHandlerTransalator = $commandHandlerTransalator;
        $this->commandHandlerResolver = $commandHandlerResolver;
    }

    public function execute(Command $command)
    {
        $handlerClass = $this->commandHandlerTransalator->translate($command);

        $handler = $this->commandHandlerResolver->resolve($command, $handlerClass);

        return $handler->handle($command);
    }
}
