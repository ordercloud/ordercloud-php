<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Requests\Connections\GetConnectionsByTypeRequest;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;

class GetConnectionsByTypeRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetConnectionsByTypeRequest $request
     */
    protected function configure($request)
    {
        $organisaionID = null;

        if ($request->hasOrganisationID()) {
            $organisaionID = $request->getOrganisationID() . '/';
        }

        $this->setUrl('/resource/organisations/%sconnections/type/%s', $organisaionID, $request->getType())
            ->setEntityArrayClass('Ordercloud\Entities\Connections\Connection');
    }
}
