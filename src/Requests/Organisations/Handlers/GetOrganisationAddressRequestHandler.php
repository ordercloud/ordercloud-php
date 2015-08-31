<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationAddressRequest;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;

class GetOrganisationAddressRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrganisationAddressRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations/%d/address', $request->getOrganisationID())
            ->setEntityClass('Ordercloud\Entities\Organisations\OrganisationAddress');
    }
}
