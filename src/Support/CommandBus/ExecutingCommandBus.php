<?php namespace Ordercloud\Support\CommandBus;

class ExecutingCommandBus implements CommandBus
{
    /**
     * @var CommandHandlerTransalator
     */
    private $commandHandlerTransalator;

    public function __construct(CommandHandlerTransalator $commandHandlerTransalator)
    {
        $this->commandHandlerTransalator = $commandHandlerTransalator;
    }

    public function execute(Command $command)
    {
        $handler = $this->commandHandlerTransalator->resolve($command);

        return $handler->handle($command);
    }
}
