<?php namespace Ordercloud\Support\CommandBus;

use Exception;
use Ordercloud\OrdercloudException;

class CommandHandlerNotFoundException extends OrdercloudException
{
    /** @var Command */
    private $command;

    public function __construct(Command $command)
    {
        parent::__construct(sprintf('No handler found for command [%s].', get_class($command)));
        $this->command = $command;
    }

    /**
     * @return Command
     */
    public function getCommand()
    {
        return $this->command;
    }
}
