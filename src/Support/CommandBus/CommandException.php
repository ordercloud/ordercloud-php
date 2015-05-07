<?php namespace Ordercloud\Support\CommandBus;

use Ordercloud\Ordercloud\OrdercloudException;

class CommandException extends OrdercloudException
{
    /** @var Command */
    private $command;

    /**
     * @param string  $message
     * @param Command $command
     *
     * @throws OrdercloudException
     */
    public function __construct($message, Command $command)
    {
        parent::__construct($message);
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
