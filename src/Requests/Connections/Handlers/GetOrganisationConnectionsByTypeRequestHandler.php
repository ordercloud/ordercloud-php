<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Requests\Connections\GetOrganisationConnectionsByTypeRequest;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;

class GetOrganisationConnectionsByTypeRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrganisationConnectionsByTypeRequest $request
     */
    protected function configure($request)
    {
        $organisaionId = null;
        $criteria = $request->getCriteria();

        if ($request->hasOrganisationId()) {
            $organisaionId = $request->getOrganisationId() . '/';
        }

        $this->setUrl('/resource/organisations/%sconnections/type/%s', $organisaionId, $request->getTypeCode())
             ->setQueryParameters([
                 'showDisabled' => $criteria->getShowDisabled() ? 'true' : 'false',
                 'page'         => $criteria->getPage(),
                 'pagesize'     => $criteria->getPageSize(),
                 'sort'         => $criteria->getSort(),
             ])
             ->setEntityArrayClass('Ordercloud\Entities\Connections\Connection');
    }
}
