<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Entities\Organisations\Organisation;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetOrganisationRequestHandler implements CommandHandler
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
     * @param GetOrganisationRequest $request
     *
     * @return Organisation
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                'GET',
                "resource/organisations/{$organisationID}",
                [ 'access_token' => $accessToken ]
            )
        );

        return $this->parser->parseOrganisation($response->getData());
    }
}