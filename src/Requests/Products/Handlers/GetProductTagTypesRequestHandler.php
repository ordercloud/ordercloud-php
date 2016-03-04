<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\ProductTagType;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Products\GetProductTagTypesRequest;

class GetProductTagTypesRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetProductTagTypesRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/product/tag/types')
            ->setEntityArrayClass('Ordercloud\Entities\Products\ProductTagType');
    }
}
