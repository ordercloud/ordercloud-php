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
        $this->setUrl('resource/users/%d/geos', $request->getUserID())
            ->setEntityArrayClass('Ordercloud\Entities\Users\UserAddress');
    }
}
