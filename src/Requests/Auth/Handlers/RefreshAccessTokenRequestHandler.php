<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\RefreshAccessTokenRequest;
use Ordercloud\Requests\Handlers\AbstractRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class RefreshAccessTokenRequestHandler extends AbstractRequestHandler
{
    /**
     * @param RefreshAccessTokenRequest $request
     */
    protected function configure($request)
    {
        $this->method = OrdercloudRequest::METHOD_POST;
        $this->url = 'resource/token/';
        $this->parameters = [
            'organisation_code'   => $request->getOrganisationCode(),
            'organisation_secret' => $request->getClientSecret(),
            'grant_type'          => 'refresh_token',
            'refresh_token'       => $request->getRefreshToken()
        ];
        $this->headers = ['Content-type' => 'application/x-www-form-urlencoded'];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Auth\AccessToken', $response->getData());
    }
}
