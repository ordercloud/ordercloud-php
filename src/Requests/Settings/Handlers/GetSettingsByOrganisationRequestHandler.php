<?php namespace Ordercloud\Requests\Settings\Handlers;

use Ordercloud\Entities\Settings\SettingsCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Settings\GetSettingsByOrganisationRequest;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetSettingsByOrganisationRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetSettingsByOrganisationRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("resource/organisations/%d/settings", $request->getOrganisationID());
    }

    protected function transformResponse($response)
    {
        $settings = EntityReflector::parseAll('Ordercloud\Entities\Settings\Setting', $response->getData('results'));

        return new SettingsCollection($settings);
    }
}
