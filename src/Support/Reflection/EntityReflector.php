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
     * @return mixed
     *
     * @throws EntityParseException
     */
    public static function parse($className, array $arguments)
    {
        $reflector = new static($className, $arguments);

        try {
            $reflection = $reflector->reflect();
        }
        catch (EntityReflectionException $e) {
            throw new EntityParseException($className, $arguments, $e);
        }

        return $reflection;
    }

    /**
     * @param $url
     *
     * @return int
     *
     * @throws EntityReflectionException
     */
    public static function parseResourceIDFromURL($url)
    {
        if (is_null($url)) {
            throw new EntityReflectionException("Resource ID can't be parsed, null url");
        }

        $resourceLocationParts = explode('/', $url);

        if ( ! is_array($resourceLocationParts)) {
            throw new EntityReflectionException("Resource ID not found in request, location: {$url}");
        }

        $id = intval(end($resourceLocationParts));

        if ($id === 0) {
            throw new EntityReflectionException("Invalid resource ID found in request, location: {$url}");
        }

        return $id;
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
     *
     * @throws ArgumentNotProvidedException
     * @throws NullRequiredArgumentException
     */
    private function prepareArgument(ReflectionParameter $parameter)
    {
        $parameterName = $parameter->getName();
        $argument = $this->getArgument($parameterName);

        if ($parameter->isArray()) {
            return $this->prepareArrayArgument($parameter, $argument);
        }

        if (is_null($argument) && ! $parameter->allowsNull()) {
            throw NullRequiredArgumentException::create($parameterName, $this->getName());
        }

        if ( ! is_null($argument) && $parameterClass = $parameter->getClass()) {
            return (new static($parameterClass->getName(), $argument))->reflect();
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
        $parameterAlias = $this->getParameterAlias($parameterName);

        if (array_key_exists($parameterAlias, $this->arguments)) {
            return $this->arguments[$parameterAlias];
        }

        throw new ArgumentNotProvidedException($this->getName(), $this->arguments, $parameterName, $parameterAlias);
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
            $results = [];

            foreach ($argument as $objectArguments) {
                $results[] = (new static($className, $objectArguments))->reflect();
            }

            return $results;
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
