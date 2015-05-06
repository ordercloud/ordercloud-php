<?php namespace Ordercloud\Support\CommandBus;

/**
 * The CommandHandlerTranslator recieves a Command instance and
 * produces it's corresponding CommandHandler counter-part.
 *
 * The default implementation is the ArrayCommandHandlerTranslator.
 * It recieves an array of CommandHandler instances, indexed by
 * the Full Domain Name of the corresponding Command class.
 */
interface CommandHandlerTransalator
{
    /**
     * @param $command
     * @return CommandHandler|null
     */
    public function resolve(Command $command);
}
