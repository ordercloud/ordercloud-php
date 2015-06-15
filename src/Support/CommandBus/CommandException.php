<?php namespace Ordercloud\Support\CommandBus;

use Exception;
use Ordercloud\OrdercloudException;

class CommandException extends OrdercloudException
{
    /** @var Command */
    private $command;

    /**
     * @param string     $message
     * @param Command    $command
     * @param Exception $previousException
     */
    public function __construct($message, Command $command, Exception $previousException = null)
    {
        parent::__construct($message, 0, $previousException);
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
