<?php namespace Ordercloud\Support\CommandBus;

/**
 * The CommandHandlerTranslator recieves a Command instance
 * and translates it to it's corresponding
 * CommandHandler class name.
 */
interface CommandHandlerTranslator
{
    /**
     * @param $command
     *
     * @return string
     */
    public function translate(Command $command);
}
