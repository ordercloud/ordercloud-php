<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserAddressesRequest;

class GetUserAddressesRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserAddressesRequest $request
     */
    protected function configure($request)
    {
        $criteria = $request->getCriteria();
        $this->setUrl('resource/users/%d/geos', $request->getUserID())
            ->setQueryParameters([
                'page'          => $criteria->getPage(),
                'pagesize'      => $criteria->getPageSize(),
            ])
            ->setEntityArrayClass('Ordercloud\Entities\Users\UserAddress');
    }
}
