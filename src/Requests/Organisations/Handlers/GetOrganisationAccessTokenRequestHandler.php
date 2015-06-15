<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationAccessTokenRequest;

class GetOrganisationAccessTokenRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param GetOrganisationAccessTokenRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations/%d/accesstoken', $request->getOrganisationID())
            ->setHeader('Authorization', $request->getAuthHeader())
            ->setEntityClass('Ordercloud\Entities\Organisations\OrganisationAccessToken');
    }
}
