<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Handlers\IdentifyByIdTrait;
use Ordercloud\Requests\Products\CreateProductTagRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateProductTagRequestHandler extends AbstractPostRequestHandler
{
    use IdentifyByIdTrait;

    /**
     * @param CreateProductTagRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/product/tag')
            ->setBodyParameters([
                'name' => $request->getName(),
                'description' => $request->getDescription(),
                'shortDescription' => $request->getShortDescription(),
                'tagType' => $this->identifyById($request->getTagTypeId()),
                'organisation' => $this->identifyById($request->getOrganisationId()),
            ]);
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
