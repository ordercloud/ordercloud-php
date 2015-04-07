<?php namespace Ordercloud\Ordercloud;

use Exception;

class OrdercloudException extends Exception
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        throw $this;
    }
}
