<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\ProductTag;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetProductTagsForOrganisationByTypeNameRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class GetProductTagsForOrganisationByTypeNameRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetProductTagsForOrganisationByTypeNameRequest $request
     *
     * @return array|ProductTag[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $typeName = $request->getTagName();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "/resource/product/tag/organisation/{$organisationID}/type/{$typeName}",
                [ 'access_token' => $accessToken ]
            )
        );

        return EntityReflector::parseAll('Ordercloud\Entities\Products\ProductTag', $response->getData('results'));
    }
}
