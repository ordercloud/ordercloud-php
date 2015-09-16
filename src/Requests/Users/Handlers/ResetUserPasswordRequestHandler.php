<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;

class ResetUserPasswordRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/users/%d/resetpassword', $request->getUserID());
    }

    protected function transformResponse($response)
    {
        return $response;
    }
}
