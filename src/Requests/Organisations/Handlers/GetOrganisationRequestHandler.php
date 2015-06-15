<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;

class GetOrganisationRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrganisationRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations/%d', $request->getOrganisationID())
            ->setEntityClass('Ordercloud\Entities\Organisations\Organisation');
    }
}
