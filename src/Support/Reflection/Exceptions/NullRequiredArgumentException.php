<?php namespace Ordercloud\Support\Reflection\Exceptions;

class NullRequiredArgumentException extends EntityReflectionException
{
    /**
     * @var string
     */
    private $parameterName;
    /**
     * @var string
     */
    private $className;

    /**
     * @param string $parameterName
     * @param string $className
     */
    public function __construct($parameterName, $className)
    {
        parent::__construct("Required parameter [{$parameterName}] is null on [{$className}]");
        $this->parameterName = $parameterName;
        $this->className = $className;
    }

    /**
     * @param string $parameterName
     * @param string $className
     *
     * @return static
     */
    public static function create($parameterName, $className)
    {
        return new static($parameterName, $className);
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
    public function getClassName()
    {
        return $this->className;
    }
}
