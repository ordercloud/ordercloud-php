<?php namespace Ordercloud\Support\Reflection\Exceptions;

class ArgumentNotProvidedException extends EntityReflectionException
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
        $parameterAlias = strcasecmp($parameterName, $parameterAlias) === 0 ? null : $parameterAlias;
        $alias = is_null($parameterAlias) ? null : "aliased as [$parameterAlias] ";

        parent::__construct(
            sprintf('Required parameter [%s] %son class [%s] not provided.', $parameterName, $alias, $className)
        );

        $this->className = $className;
        $this->parameterName = $parameterName;
        $this->arguments = $arguments;
        $this->parameterAlias = strcasecmp($parameterName, $parameterAlias) === 0 ? null : $parameterAlias;
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
