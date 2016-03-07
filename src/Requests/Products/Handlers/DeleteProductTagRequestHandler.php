<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractDeleteRequestHandler;
use Ordercloud\Requests\Products\DeleteProductTagRequest;

class DeleteProductTagRequestHandler extends AbstractDeleteRequestHandler
{
    /**
     * @param DeleteProductTagRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag/%d', $request->getTagId());
    }
}
