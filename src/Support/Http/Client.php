<?php namespace Ordercloud\Support\Http;

interface Client
{
    /**
     * @param string $url
     * @param string $method
     * @param array  $params
     * @param array  $headers
     *
     * @return Response
     *
     * @throws OrdercloudHttpException
     */
    public function send($url, $method, array $params, array $headers);
}
