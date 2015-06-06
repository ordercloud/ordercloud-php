<?php namespace Ordercloud\Support;

use Ordercloud\OrdercloudException;
use ReflectionClass;
use ReflectionParameter;

class EntityReflector extends ReflectionClass
{
    private static $propertyNameOverrides = [
        'Ordercloud\Entities\Organisations\Organisation' => [
            'profiles' => 'profile'
        ],
        'Ordercloud\Entities\Connections\Connection' => [
            'fees' => 'fee'
        ],
        'Ordercloud\Entities\Products\Product' => [
            'optionSets' => 'options',
            'extraSets' => 'extras',
        ],
        'Ordercloud\Entities\Orders\Order' => [
            'userAddress' => 'userGeo',
            'paymentMethods' => 'paymentMethod',
        ],
        'Ordercloud\Entities\Delivery\DeliveryAgent' => [
            'userProfile' => 'user',
        ],
        'Ordercloud\Entities\Auth\AccessToken' => [
            'accessToken' => 'access_token',
            'refreshToken' => 'refresh_token',
            'expiresIn' => 'expires_in',
        ]
    ];

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
     * @param array|ReflectionParameter[] $parameters
     *
     * @return array
     */
    private function prepareArguments(array $parameters)
    {
        $prepareArguments = [];

        foreach ($parameters as $parameter) {
            $prepareArguments[] = $this->prepareArgument($parameter);
        }

        return $prepareArguments;
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
        if (isset(self::$propertyNameOverrides[$this->getName()])) {
            $overrides = self::$propertyNameOverrides[$this->getName()];
            if (isset($overrides[$parameterName])) {
                $parameterName = $overrides[$parameterName];
            }
        }

        if (array_key_exists($parameterName, $this->arguments)) {
            return $this->arguments[$parameterName];
        }

        throw new ArgumentNotProvidedException($this->getName(), $parameterName, $this->arguments);
    }

    /**
     * @param ReflectionParameter $parameter
     *
     * @return mixed
     */
    private function prepareArgument($parameter)
    {
        $parameterName = $parameter->getName();
        $argument = $this->getArgument($parameterName);

        if (is_null($argument) && $parameter->isArray()) {
            $argument = [];
        }
        elseif ( ! is_null($argument) && $parameterClass = $parameter->getClass()) {
            $argument = $this->parse($parameterClass->getName(), $argument);
        }

        return $argument;
    }

    /**
     * @return object
     */
    private function reflect()
    {
        $parameters = $this->getConstructor()->getParameters();

        $preparedArguments = $this->prepareArguments($parameters);

        return $this->newInstanceArgs($preparedArguments);
    }
}
