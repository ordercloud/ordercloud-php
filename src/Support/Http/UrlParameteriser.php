<?php namespace Ordercloud\Support\Http;

interface UrlParameteriser
{
    /**
     * @param array  $parameters
     * @param string $url
     *
     * @return string
     */
    public function appendParametersToUrl(array $parameters, $url);
}
