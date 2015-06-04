<?php namespace Ordercloud\Support\Http;

interface UrlParameteriser
{
    /**
     * @param string $url
     * @param array  $parameters
     *
     * @return string
     */
    public function appendParametersToUrl($url, array $parameters);
}
