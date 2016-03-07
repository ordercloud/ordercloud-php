<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Products\DisableProductTagRequest;

class DisableProductTagRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param DisableProductTagRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag/%d/change/disable', $request->getTagId());
    }
}
