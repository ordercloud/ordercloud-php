<?php namespace Ordercloud\Support\Http;

interface UrlParameteriser
{
    /**
     * @param array  $parameters
     * @param string $url
     *
     * @return string The path of the url with the parameters appended
     */
    public function appendParametersToUrl(array $parameters, $url);
}
