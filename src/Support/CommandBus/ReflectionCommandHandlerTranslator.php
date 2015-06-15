<?php namespace Ordercloud\Support\CommandBus;

use ReflectionClass;

class ReflectionCommandHandlerTranslator implements CommandHandlerTranslator
{
    /**
     * @param Command $command
     *
     * @return string
     */
    public function translate(Command $command)
    {
        $commandClass = new ReflectionClass($command);

        return sprintf('%s\\Handlers\\%sHandler', $commandClass->getNamespaceName(), $commandClass->getShortName());
    }
}
