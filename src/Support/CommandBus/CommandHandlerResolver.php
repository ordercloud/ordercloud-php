<?php namespace Ordercloud\Support\CommandBus;

interface CommandHandlerResolver
{
    /**
     * @param Command $command
     * @param string  $handlerClass
     *
     * @return CommandHandler
     *
     * @throws CommandHandlerNotResolvableException
     */
    public function resolve(Command $command, $handlerClass);
}
