<?php namespace Ordercloud\Requests\Settings\Handlers;

use Ordercloud\Entities\Settings\Setting;
use Ordercloud\Entities\Settings\SettingsCollection;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Settings\GetSettingsByOrganisation;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetSettingsByOrganisationHandler implements CommandHandler
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
     * @param GetSettingsByOrganisation $request
     *
     * @return array|Setting[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                "resource/organisations/{$organisationID}/settings",
                [ 'access_token' => $accessToken ]
            )
        );

        $settings = $this->parser->parseSettings($response->getData('results'));

        return new SettingsCollection($settings);
    }
}
