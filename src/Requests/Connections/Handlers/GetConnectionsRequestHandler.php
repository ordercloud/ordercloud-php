<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Requests\Connections\GetConnectionsRequest;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Handlers\IdentifyByIdTrait;

class GetConnectionsRequestHandler extends AbstractGetRequestHandler
{
    use IdentifyByIdTrait;

    /**
     * @param GetConnectionsRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();

        $organisationId = $request->getOrganisationId();

        $this->setUrl('resource/organisations/%d/connections', $organisationId)
            ->setQueryParameters([
                'showDisabled' => $criteria->getShowDisabled() ? 'true' : 'false',
                'page'         => $criteria->getPage(),
                'pagesize'     => $criteria->getPageSize(),
                'sort'         => $criteria->getSort(),
                'lat'          => $criteria->getLat(),
                'long'         => $criteria->getLon(),
                'radius'       => $criteria->getRadius(),
                'type'         => $criteria->getType(),
                'status'       => $criteria->getStatuses(),
                'industry'     => $criteria->getIndustries(),
            ])
            ->setEntityArrayClass('Ordercloud\Entities\Connections\Connection');
    }
}
