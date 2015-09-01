<?php namespace Ordercloud\Support\Reflection;

class NullRequiredArgumentException extends EntityReflectionException
{
    public static function create($parameterName)
    {
        return new static("Required parameter [{$parameterName}] is null");
    }
}
