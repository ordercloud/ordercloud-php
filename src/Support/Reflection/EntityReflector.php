<?php namespace Ordercloud\Support\Reflection;

use Ordercloud\OrdercloudException;
use ReflectionClass;
use ReflectionParameter;

class EntityReflector extends ReflectionClass
{
    /** @var array */
    private $arguments;

    /**
     * @param string $className
     * @param array  $arguments
     */
    public function __construct($className, array $arguments)
    {
        parent::__construct($className);
        $this->arguments = $arguments;
    }

    /**
     * @param string $className
     * @param array  $arguments
     *
     * @return array
     */
    public static function parseAll($className, array $arguments)
    {
        $results = [];

        foreach ($arguments as $objectArguments) {
            $results[] = static::parse($className, $objectArguments);
        }

        return $results;
    }

    /**
     * @param string $className
     * @param array  $arguments
     *
     * @return object
     */
    public static function parse($className, array $arguments)
    {
        $reflector = new static($className, $arguments);

        return $reflector->reflect();
    }

    /**
     * @param $url
     *
     * @return int
     *
     * @throws OrdercloudException
     */
    public static function parseResourceIDFromURL($url)
    {
        if (is_null($url)) {
            throw new OrdercloudException("Resource ID can't be parsed, null url");
        }

        $resourceLocationParts = explode('/', $url);

        if ( ! is_array($resourceLocationParts)) {
            new OrdercloudException("Resource ID not found in request, loaction: {$url}");
        }

        return intval(end($resourceLocationParts));
    }

    /**
     * @return object
     */
    public function reflect()
    {
        if (is_null($this->arguments)) {
            return null;
        }

        $parameters = $this->getConstructor()->getParameters();

        $preparedArguments = $this->prepareArguments($parameters);

        return $this->newInstanceArgs($preparedArguments);
    }

    /**
     * @param array|ReflectionParameter[] $parameters
     *
     * @return array
     */
    private function prepareArguments(array $parameters)
    {
        $preparedArguments = [];

        foreach ($parameters as $parameter) {
            $preparedArguments[] = $this->prepareArgument($parameter);
        }

        return $preparedArguments;
    }

    /**
     * @param ReflectionParameter $parameter
     *
     * @return mixed
     */
    private function prepareArgument(ReflectionParameter $parameter)
    {
        $parameterName = $parameter->getName();
        $argument = $this->getArgument($parameterName);

        if ($parameter->isArray()) {
            return $this->prepareArrayArgument($parameter, $argument);
        }

        if ( ! is_null($argument) && $parameterClass = $parameter->getClass()) {
            return $this->parse($parameterClass->getName(), $argument);
        }

        return $argument;
    }

    /**
     * @param string $parameterName
     *
     * @return array
     *
     * @throws ArgumentNotProvidedException
     */
    private function getArgument($parameterName)
    {
        $parameterName = $this->getParameterAlias($parameterName);

        if (array_key_exists($parameterName, $this->arguments)) {
            return $this->arguments[$parameterName];
        }

        throw new ArgumentNotProvidedException($this->getName(), $parameterName, $this->arguments);
    }

    /**
     * @param $parameterName
     *
     * @return mixed
     */
    private function getParameterAlias($parameterName)
    {
        if ( ! $this->hasProperty($parameterName)) {
            return $parameterName;
        }

        $property = $this->getProperty($parameterName);

        $docBlock = new DocBlock($property->getDocComment());

        if ( ! $docBlock->hasTag('reflectName')) {
            return $parameterName;
        }

        return $docBlock->getTag('reflectName');
    }

    public function prepareArrayArgument(ReflectionParameter $parameter, array $argument = null)
    {
        if (is_null($argument)) {
            return [];
        }

        if ($className = $this->getArrayClass($parameter->getName())) {
            return $this->parseAll($className, $argument);
        }

        return $argument;
    }

    public function getArrayClass($parameterName)
    {
        $property = $this->getProperty($parameterName);

        $docBlock = new DocBlock($property->getDocComment());

        if ( ! $docBlock->hasTag('reflectType')) {
            return null;
        }

        return $docBlock->getTag('reflectType');
    }
}
