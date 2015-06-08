<?php namespace Ordercloud\Support\CommandBus;

/**
 * The CommandHandlerTranslator recieves a Command instance and
 * produces it's corresponding CommandHandler counter-part.
 */
interface CommandHandlerTranslator
{
    /**
     * @param $command
     *
     * @return CommandHandler|null
     *
     * @throws CommandHandlerNotFoundException
     */
    public function resolve(Command $command);
}
