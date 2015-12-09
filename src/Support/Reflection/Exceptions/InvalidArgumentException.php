<?php namespace Ordercloud\Support\Reflection\Exceptions;

class InvalidArgumentException extends EntityReflectionException
{
    /**
     * @var string
     */
    private $className;
    /**
     * @var mixed
     */
    private $argument;

    /**
     * @param string $className
     * @param mixed  $argument
     */
    public function __construct($className, $argument)
    {
        parent::__construct("Failed to parse [{$className}] with data [" . json_encode($argument) . ']');
        $this->className = $className;
        $this->argument = $argument;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return mixed
     */
    public function getArgument()
    {
        return $this->argument;
    }
}
