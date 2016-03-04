<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Products\UpdateProductTagRequest;

class UpdateProductTagRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param UpdateProductTagRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag/%d', $request->getTagId())
            ->setBodyParameters([
                'name'             => $request->getName(),
                'description'      => $request->getDescription(),
                'shortDescription' => $request->getShortDescription(),
            ]);
    }
}
