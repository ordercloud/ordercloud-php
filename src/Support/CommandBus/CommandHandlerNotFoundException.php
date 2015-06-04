<?php namespace Ordercloud\Support\CommandBus;

use Exception;
use Ordercloud\OrdercloudException;

class CommandHandlerNotFoundException extends CommandException
{
    public function __construct(Command $command)
    {
        parent::__construct(sprintf('Handler class not found for command [%s].', get_class($command)), $command);
    }
}
