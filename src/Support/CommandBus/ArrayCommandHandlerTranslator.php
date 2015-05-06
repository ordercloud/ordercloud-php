<?php namespace Ordercloud\Support\CommandBus;

class ArrayCommandHandlerTranslator implements CommandHandlerTransalator
{
    /** @var array */
    private $register;

    /**
     * Keys are the full namespaced name of the command & the value is the handler.
     * The handler can be an instance of the handler or a callable / closure
     * which returns an instance of the handler. Once a handler has
     * been resolved, the instance will be stored and re-used.
     *
     * @param array $register
     */
    public function __construct(array $register = [])
    {
        $this->register = $register;
    }

    /**
     * The command handler can be an instance of CommandHandler or a callable.
     *
     * @param string                  $commandName
     * @param CommandHandler|callable $handler
     */
    public function registerHandler($commandName, $handler)
    {
        $this->register[$commandName] = $handler;
    }

    public function resolve(Command $command)
    {
        $commandName = get_class($command);

        if ( ! isset($this->register[$commandName])) {
            return null;
        }

        $handler = $this->register[$commandName];

        if ( ! $handler instanceof CommandHandler) {
            $handler = $this->initHandler($commandName);
        }

        return $handler;
    }

    /**
     * @param string $commandName
     *
     * @return CommandHandler
     */
    protected function initHandler($commandName)
    {
        $handler = $this->register[$commandName]();

        $this->register[$commandName] = $handler;

        return $handler;
    }
}
