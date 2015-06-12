<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\RefreshAccessTokenRequest;
use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class RefreshAccessTokenRequestHandler extends AbstractPostRequestHandler
{
    protected $url = 'resource/token/';
    protected $headers = ['Content-type' => 'application/x-www-form-urlencoded'];

    /**
     * @param RefreshAccessTokenRequest $request
     */
    protected function configure($request)
    {
        $this->parameters = [
            'organisation_code'   => $request->getOrganisationCode(),
            'organisation_secret' => $request->getClientSecret(),
            'grant_type'          => 'refresh_token',
            'refresh_token'       => $request->getRefreshToken()
        ];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Auth\AccessToken', $response->getData());
    }
}
