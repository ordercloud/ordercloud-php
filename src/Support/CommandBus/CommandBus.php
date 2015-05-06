<?php namespace Ordercloud\Support\CommandBus;

interface CommandBus
{
    /**
     * @param Command $command
     */
    public function execute(Command $command);
}
