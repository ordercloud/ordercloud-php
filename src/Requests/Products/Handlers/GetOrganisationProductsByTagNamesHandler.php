<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetOrganisationProductsByTagNames;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetOrganisationProductsByTagNamesHandler implements CommandHandler
{
    /** @var Parser */
    private $parser;
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->parser = $parser;
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetOrganisationProductsByTagNames $request
     *
     * @return array|Product[]
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_PUT,
                'resource/product/criteria',
                [
                    'organisations' => $request->getOrganisationIDs(),
                    'tags'          => $request->getTagNames(),
                    'access_token'  => $request->getAccessToken()
                ]
            )
        );

        return $this->parser->parseProducts($response->getData('results'));
    }
}
