<?php namespace Ordercloud\Support\CommandBus;

use Exception;

class CommandHandlerNotResolvableException extends CommandException
{
    /**
     * @param Command   $command
     * @param string    $handlerClass
     * @param Exception $previousException
     */
    public function __construct(Command $command, $handlerClass, Exception $previousException = null)
    {
        parent::__construct(sprintf('Handler class [%s] not resolvable.', $handlerClass, get_class($command)), $command, $previousException);
    }
}
