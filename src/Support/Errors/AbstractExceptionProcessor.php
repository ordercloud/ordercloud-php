<?php namespace Ordercloud\Support\Errors;

use Exception;
use ReflectionClass;

abstract class AbstractExceptionProcessor implements ExceptionProcessor
{
    public function handlesException(Exception $exception)
    {
        return method_exists($this, $this->getExceptionHandlerMethod($exception));
    }

    public function processExceptionContext(Exception $exception, array $context)
    {
        $exceptionHandlerMethod = $this->getExceptionHandlerMethod($exception);

        return $this->$exceptionHandlerMethod($exception, $context);
    }

    /**
     * @param Exception $exception
     *
     * @return string
     */
    private function getExceptionHandlerMethod(Exception $exception)
    {
        $exceptionClassName = (new ReflectionClass($exception))->getShortName();

        return "handle{$exceptionClassName}";
    }
}
