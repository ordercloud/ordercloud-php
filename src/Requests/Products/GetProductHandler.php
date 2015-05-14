<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetProductHandler implements CommandHandler
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
     * @param GetProduct $request
     *
     * @return Product
     */
    public function handle($request)
    {
        $productID = $request->getProductID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                'GET',
                "resource/product/{$productID}",
                [ 'access_token' => $accessToken ]
            )
        );

        return $this->parser->parseProduct($response->getData());
    }
}
