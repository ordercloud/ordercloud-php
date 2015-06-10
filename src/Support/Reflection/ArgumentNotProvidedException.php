<?php namespace Ordercloud\Support\Reflection;

use Exception;

class ArgumentNotProvidedException extends Exception
{
    /** @var string */
    private $className;
    /** @var array */
    private $arguments;
    /** @var string */
    private $parameterName;
    /** @var string */
    private $parameterAlias;

    /**
     * @param string $className
     * @param array  $arguments
     * @param string $parameterName
     * @param string $parameterAlias
     */
    public function __construct($className, array $arguments, $parameterName, $parameterAlias)
    {
        parent::__construct("Required parameter [$parameterName] on class [$className] not provided.");
        $this->className = $className;
        $this->parameterName = $parameterName;
        $this->arguments = $arguments;
        $this->parameterAlias = $parameterAlias;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @return string
     */
    public function getParameterName()
    {
        return $this->parameterName;
    }

    /**
     * @return string
     */
    public function getParameterAlias()
    {
        return $this->parameterAlias;
    }
}
