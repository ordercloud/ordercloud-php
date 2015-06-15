<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Products\GetProductRequest;

class GetProductRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetProductRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/%d', $request->getProductID())
            ->setEntityClass('Ordercloud\Entities\Products\Product');
    }
}
