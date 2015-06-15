<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationAccessTokenRequest;

class GetOrganisationAccessTokenRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrganisationAccessTokenRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations/%d/accesstoken', $request->getOrganisationID())
            ->setHeader('Authorization', (string) $request->getAuthorisation())
            ->setEntityClass('Ordercloud\Entities\Organisations\OrganisationAccessToken');
    }
}
