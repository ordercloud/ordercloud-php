<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Users\DisableUserAddressRequest;

class DisableUserAddressRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param DisableUserAddressRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/geos/%d/disable', $request->getAddressId());
    }

    protected function transformResponse($response)
    {
        return $response;
    }
}
