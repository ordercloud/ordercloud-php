<?php namespace Ordercloud\Support\Errors;

use Exception;

interface ExceptionHandler
{
    /**
     * @param Exception $exception
     */
    public function handleException(Exception $exception);
}
