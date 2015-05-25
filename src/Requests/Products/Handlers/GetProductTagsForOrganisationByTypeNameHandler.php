<?php namespace Ordercloud\Requests\Products\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Products\GetProductTagsForOrganisationByTypeName;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetProductTagsForOrganisationByTypeNameHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;
    /** @var Parser */
    private $parser;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->ordercloud = $ordercloud;
        $this->parser = $parser;
    }

    /**
     * @param GetProductTagsForOrganisationByTypeName $request
     *
     * @return array|UserAddress[]
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

        return $this->parser->parseProductTags($response->getData('results'));
    }
}
