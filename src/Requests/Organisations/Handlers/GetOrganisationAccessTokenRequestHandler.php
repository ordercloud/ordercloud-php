<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationAccessTokenRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrganisationAccessTokenRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param GetOrganisationAccessTokenRequest $request
     */
    protected function configure($request)
    {
        $this->url = "resource/organisations/{$request->getOrganisationID()}/accesstoken";
        $this->headers = ['Authorization' => $request->getAuthHeader()];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Organisations\OrganisationAccessToken', $response->getData());
    }
}
