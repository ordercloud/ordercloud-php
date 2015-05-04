<?php namespace Ordercloud\Support\Http;

interface UrlParameteriser
{
    /**
     * @param array $parameters
     *
     * @return string
     */
    public function parameterise(array $parameters);
}
