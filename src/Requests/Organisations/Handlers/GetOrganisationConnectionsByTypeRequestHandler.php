<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationConnectionsByTypeRequest;

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
             ->setParameters([
                 'showDisabled' => $criteria->getShowDisabled() ? 'true' : 'false',
                 'page'         => $criteria->getPage(),
                 'pagesize'     => $criteria->getPageSize(),
                 'sort'         => $criteria->getSort(),
             ])
             ->setEntityArrayClass('Ordercloud\Entities\Connections\Connection');
    }
}
