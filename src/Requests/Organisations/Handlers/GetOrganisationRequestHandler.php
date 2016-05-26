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
        $organisation = $request->getOrganisationId() ? '/' . $request->getOrganisationId() : '';
        
        $this->setUrl('resource/organisations%s', $organisation)
            ->setEntityClass('Ordercloud\Entities\Organisations\Organisation');
    }
}
