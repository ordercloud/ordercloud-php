<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
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
        $organisationID = $request->getOrganisationID();
        $tagNames = $request->getTagNames();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                'PUT',
                'resource/product/criteria',
                [
                    'organisations' => [ $organisationID ],
                    'tags' => $tagNames,
                    'access_token' => $accessToken
                ]
            )
        );

        return $this->parser->parseProducts($response->getData('results'));
    }
}
