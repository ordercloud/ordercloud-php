<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\RefreshAccessTokenRequest;
use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;

class RefreshAccessTokenRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param RefreshAccessTokenRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/token')
            ->setBodyParameters([
                'organisation_code'   => $request->getOrganisationCode(),
                'organisation_secret' => $request->getClientSecret(),
                'grant_type'          => 'refresh_token',
                'refresh_token'       => $request->getRefreshToken()
            ])
            ->setEntityClass('Ordercloud\Entities\Auth\AccessToken');
    }
}
