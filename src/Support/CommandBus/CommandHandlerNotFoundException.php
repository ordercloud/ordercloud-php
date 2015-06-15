<?php namespace Ordercloud\Support\CommandBus;

class CommandHandlerNotFoundException extends CommandException
{
    /**
     * @param Command $command
     * @param string  $handlerClass
     */
    public function __construct(Command $command, $handlerClass)
    {
        parent::__construct(sprintf('Handler class [%s] not found for command [%s].', $handlerClass, get_class($command)), $command);
    }
}
