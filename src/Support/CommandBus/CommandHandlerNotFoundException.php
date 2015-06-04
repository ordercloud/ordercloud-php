<?php namespace Ordercloud\Support\CommandBus;

use Exception;
use Ordercloud\OrdercloudException;

class CommandHandlerNotFoundException extends CommandException
{
    public function __construct(Command $command, $handlerClass)
    {
        parent::__construct(sprintf('Handler class [%s] not found for command [%s].', $handlerClass, get_class($command)), $command);
    }
}
