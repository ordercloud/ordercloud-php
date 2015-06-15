<?php namespace Ordercloud\Support\CommandBus;

class ArrayCommandHandlerTranslator implements CommandHandlerTranslator
{
    /**
     * @var array
     */
    private $translations;
    /**
     * @var CommandHandlerTranslator
     */
    private $commandHandlerTranslator;

    /**
     * @param CommandHandlerTranslator $commandHandlerTranslator
     * @param array                    $translations
     */
    public function __construct(CommandHandlerTranslator $commandHandlerTranslator, array $translations = [])
    {
        $this->translations = $translations;
        $this->commandHandlerTranslator = $commandHandlerTranslator;
    }

    public function translate(Command $command)
    {
        $commandClass = get_class($command);

        if (isset($this->translations[$commandClass])) {
            return $this->translations[$commandClass];
        }

        return $this->commandHandlerTranslator->translate($command);
    }
}
