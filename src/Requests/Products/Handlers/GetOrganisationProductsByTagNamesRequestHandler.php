<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetOrganisationProductsByTagNamesRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class GetOrganisationProductsByTagNamesRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetOrganisationProductsByTagNamesRequest $request
     *
     * @return array|Product[]
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_PUT, 'resource/product/criteria', [
                    'organisations' => $request->getOrganisationIDs(),
                    'tags'          => $request->getTagNames(),
                    'access_token'  => $request->getAccessToken()
                ]
            )
        );

        return EntityReflector::parseAll('Ordercloud\Entities\Products\Product', $response->getData('results'));
    }
}
