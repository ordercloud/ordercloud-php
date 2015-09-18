<?php namespace Ordercloud\Support\Errors;

use Exception;

interface ExceptionProcessor
{
    /**
     * Check if this processor handles the given exception.
     *
     * @param Exception $exception
     *
     * @return bool
     */
    public function handlesException(Exception $exception);

    /**
     * @param Exception $exception
     * @param array     $context
     *
     * @return array
     */
    public function processExceptionContext(Exception $exception, array $context);
}
