<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Products\GetProductTagsForOrganisationByTypeNameRequest;

class GetProductTagsForOrganisationByTypeNameRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetProductTagsForOrganisationByTypeNameRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag/organisation/%s/type/%s', $request->getOrganisationID(), $request->getTagName())
            ->setEntityArrayClass('Ordercloud\Entities\Products\ProductTag');
    }
}
