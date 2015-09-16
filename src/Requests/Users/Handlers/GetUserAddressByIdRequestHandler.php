<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Users\GetUserAddressByIdRequest;

class GetUserAddressByIdRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetUserAddressByIdRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/geos/%d', $request->getAddressId())
            ->setEntityClass('Ordercloud\Entities\Users\UserAddress');
    }
}
