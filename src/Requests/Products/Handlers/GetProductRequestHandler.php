<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetProductRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetProductRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetProductRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("/resource/product/%d", $request->getProductID());
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parse('Ordercloud\Entities\Products\Product', $response->getData());
    }
}
