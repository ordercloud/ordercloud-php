<?php namespace Ordercloud\Support\Reflection\Exceptions;

class EntityParseException extends EntityReflectionException
{
    /**
     * @var string
     */
    private $className;
    /**
     * @var array
     */
    private $arguments;

    /**
     * @param string                         $className
     * @param array|null                     $arguments
     * @param EntityReflectionException|null $previousException
     */
    public function __construct($className, array $arguments = null, EntityReflectionException $previousException = null)
    {
        parent::__construct(sprintf('Failed to parse entity [%s]', $className), 0, $previousException);

        $this->className = $className;
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
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}
