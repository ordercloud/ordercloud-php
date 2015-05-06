<?php namespace Ordercloud\Support\Http;

class DefaultUrlParameteriser implements UrlParameteriser
{
    public function parameterise(array $parameters)
    {
        $query = http_build_query($parameters);

        // Remove array notations, eg. "[0]"
        $query = preg_replace('/%5B\d+%5D/', '', $query);

        return '?' .$query;
    }
}
