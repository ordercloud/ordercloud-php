<?php namespace Ordercloud\Support\Http;

interface Client
{
    /**
     * @param string $url
     * @param string $method
     * @param array  $params
     *
     * @return Response
     */
    public function send($url, $method, array $params);
}
