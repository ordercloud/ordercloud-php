<?php namespace Ordercloud\Support;

use Exception;

class ArgumentNotProvidedException extends Exception
{
    /** @var string */
    private $className;
    /** @var string */
    private $parameterName;
    /** @var array */
    private $arguments;

    public function __construct($className, $parameterName, array $arguments)
    {
        parent::__construct("Required parameter [$parameterName] on class [$className] not provided.");
        $this->className = $className;
        $this->parameterName = $parameterName;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getParameterName()
    {
        return $this->parameterName;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}
