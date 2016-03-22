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
