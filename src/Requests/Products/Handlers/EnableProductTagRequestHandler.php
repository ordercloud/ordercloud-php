<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Products\EnableProductTagRequest;

class EnableProductTagRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param EnableProductTagRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag/%d/change/enable', $request->getTagId());
    }
}
