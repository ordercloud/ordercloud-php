<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Products\GetProductTagRequest;

class GetProductTagRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetProductTagRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag/%d', $request->getTagId())
            ->setEntityClass('Ordercloud\Entities\Products\ProductTag');
    }
}
