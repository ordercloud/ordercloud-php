<?php namespace Ordercloud\Requests\Settings\Handlers;

use Ordercloud\Entities\Settings\Setting;
use Ordercloud\Entities\Settings\SettingsCollection;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Settings\GetSettingsByOrganisationRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetSettingsByOrganisationRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetSettingsByOrganisationRequest $request
     *
     * @return array|Setting[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET, "resource/organisations/{$organisationID}/settings", ['access_token' => $accessToken]
            )
        );

        $settings = EntityReflector::parseAll('Ordercloud\Entities\Settings\Setting', $response->getData('results'));

        return new SettingsCollection($settings);
    }
}
