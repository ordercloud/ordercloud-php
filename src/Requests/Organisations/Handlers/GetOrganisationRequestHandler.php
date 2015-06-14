<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetOrganisationRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrganisationRequest $request
     */
    protected function configure($request)
    {
        $this->url = "resource/organisations/{$request->getOrganisationID()}";
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Organisations\Organisation', $response->getData());
    }
}
