<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Entities\Settings\SettingsCollection;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetSettingsByOrganisationRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class GetSettingsByOrganisationRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetSettingsByOrganisationRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations/%d/settings', $request->getOrganisationId());
    }

    protected function transformResponse($response)
    {
        $settings = EntityReflector::parseAll('Ordercloud\Entities\Settings\Setting', $response->getData('results'));

        return new SettingsCollection($settings);
    }
}
